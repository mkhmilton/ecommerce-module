<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        $response = [
            'products' => $products,
        ];

        return response($response, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string',
            'price'     => 'required|numeric',
            'quantity'  => 'required|numeric',
            'image'     => 'nullable|image',
        ]);

        $product = new Product();
        $product->name      =   $request->name;
        $product->price     =   $request->price;
        $product->quantity  =   $request->quantity;
        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/';
            if (!file_exists($folder_path)) {
                mkdir($folder_path, 0777, true);
            }
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $product->image = $folder_path.$image_new_name;
        }
        try {
            $product->save();
            $response = [
                'type' => 'success',
                'message' => 'Successfully saved',
            ];
            return response($response, 201);
        }catch(\Exception $exception){
            $response = [
                'type' => 'error',
                'message' => $exception->getMessage(),
            ];
            return response($response, 203);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'      => 'required|string',
            'price'     => 'required|numeric',
            'quantity'  => 'required|numeric',
            'image'     => 'nullable|image',
        ]);

        $product->name      =   $request->name;
        $product->price     =   $request->price;
        $product->quantity  =   $request->quantity;
        if($request->hasFile('image')){
            if ($product->image != null)
                File::delete(public_path($product->image));
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/';
            if (!file_exists($folder_path)) {
                mkdir($folder_path, 0777, true);
            }
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $product->image = $folder_path.$image_new_name;
        }
        try {
            $product->save();
            $response = [
                'type' => 'success',
                'message' => 'Successfully updated',
                'product' => $product,
            ];
            return response($response, 201);
        }catch(\Exception $exception){
            $response = [
                'type' => 'error',
                'message' => $exception->getMessage(),
            ];
            return response($response, 203);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            if ($product->image != null)
                File::delete(public_path($product->image)); //Old image delete
            $product->delete();
           $response = [
                'type' => 'success',
                'message' => 'Successfully deleted'
            ];
            return response($response, 201);
        }catch (\Exception$exception){
            $response = [
                'type' => 'error',
                'message' => $exception->getMessage(),
            ];
            return response($response, 203);
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function cart(){
        if (!Session::get('cart')){
            Session::put('cart', []);
        }
        $cart_items = Session::get('cart');

        try {
            $response = [
                'type' => 'success',
                'message' => 'Successfully get cart items',
                'cart_items' => $cart_items,
            ];
            return response($response, 201);
        }catch (\Exception $exception){
            $response = [
                'type' => 'error',
                'message' => $exception->getMessage(),
            ];
            return response($response, 203);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function addToCart(Request $request){
        $request->validate([
            'product' => 'required|exists:products,id'
        ]);

        if (!Session::get('cart')){
            Session::put('cart', []);
        }

        try {
            $request->session()->push('cart', Product::findOrFail($request->product));
            $response = [
                'type' => 'success',
                'message' => 'Successfully add to cart',
                'cart_items' => Session::get('cart'),
            ];
            return response($response, 201);
        }catch (\Exception $exception){
            $response = [
                'type' => 'error',
                'message' => $exception->getMessage(),
            ];
            return response($response, 203);
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
            return response()->json([
                'type' => 'error',
                'message' => 'Your cart is empty'
            ]);
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
        return response()->json([
            'type' => 'success',
            'message' => 'Order completed',
            'order' => $order,
        ]);
    }
}
