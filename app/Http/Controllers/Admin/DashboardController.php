<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
          'admin'  => User::where('type', 'Admin')->count(),
          'seller'  => User::where('type', 'Seller')->count(),
          'customer'  => User::where('type', 'Customer')->count(),
          'order'  => Order::all()->count(),
          'delivered_order'  => Order::where('delivered', true)->count(),
          'un_delivered_order'  => Order::where('delivered', false)->count(),
          'product'  => Product::all()->sum('quantity'),
          'product_type'  => Product::all()->count(),
          'company'  => Product::all()->groupBy('company')->count(),
          'sell_amount'  => OrderItem::whereIn('order_id', Order::where('delivered', true)->pluck('id'))->count(),
        ];
        return view('backend.admin.dashboard.index', compact('data'));
    }
}
