<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index(){
        $products = Product::where('quantity', '>', 0)->orderBy('id', 'desc')->get();
        return view('frontend.index', compact('products'));
    }

    public function cart(){
        return view('frontend.cart');
    }

    public function addToCart(Request $request){
        if(!Auth::check()){
            return response()->json([
                'type' => 'error',
                'message' => 'Please login first',
                'url' => route('login'),
            ]);
        }
        $request->validate([
            'product' => 'required|exists:products,id'
        ]);

        if (!Session::get('cart')){
            Session::put('cart', []);
        }

        try {
            Session::push('cart', Product::findOrFail($request->product));
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully add to cart',
                'cart' => Session::get('cart'),
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => $exception->getMessage(),
            ]);
        }
    }

    public function removeFromCart(Request $request){
        $request->validate([
            'product' => 'required|exists:products,id'
        ]);

        if (!Session::get('cart')){
            Session::put('cart', []);
        }

        try {
            $old_carts = Session::get('cart');
            Session::put('cart', []);
            $execute = false;

            foreach ($old_carts as $old_cart){
                if (Product::findOrFail($request->product) == $old_cart && $execute == false){
                    $execute = true;
                    continue;
                }
                $request->session()->push('cart', $old_cart);
            }

            return response()->json([
                'type' => 'success',
                'message' => 'Successfully remove from cart',
                'cart' => Session::get('cart'),
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => $exception->getMessage(),
            ]);
        }
    }

    public function order(Request $request){
        $request->validate([
            'phone' => 'required|string|max:18',
            'address' => 'required|string',
            'note' => 'nullable|string',
        ]);

        //Chek cart empty or not
        if(collect(Session::get('cart'))->count() < 1){
            return back()->withErrors('Cart is empty');
        }
        //Make new order
        $order = new Order();
        $order->phone   =   $request->phone;
        $order->address =   $request->address;
        $order->note    =   $request->note;
        $order->user_id =   auth()->user()->id;
        $order->save();

        //Get cart items
        foreach (Session::get('cart') as $cart){
            $order_item = new OrderItem();
            $order_item->order_id   = $order->id;
            $order_item->product_id = $cart->id;
            $order_item->save();
        }

        //Minimize product quantity from store
        foreach($order->items->groupBy('product_id') as $product_id => $item_orders){
            $product = Product::find($product_id);
            $product->quantity = $product->quantity - $item_orders->count();
            $product->save();
        }

        //Make cart empty
        Session::put('cart', []); // make cart as empty
        return back()->withSuccess('Order completed');
    }
}
