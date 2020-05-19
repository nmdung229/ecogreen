<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index()
    {
        $orders = session('order');
//        dd($orders);
//        dd($orders);
        $result = [];
        foreach($orders as $key => $item) {

            $product = Product::findorFail($key);
//            dd($product);
            $result[$key]['product'] = $product;
            $result[$key]['quantity'] = $item['quantity'];
        }


//        die('1234');
//        dd($result);
//        dd($orders);

        return view('shop.cart', [
            'result' => $result
        ]);
    }

    public function getDatafromSession()
    {
        $orders = session('order');
        $cart = [];
        foreach($orders as $key => $item) {

            $product = Product::findorFail($key);
            $product->image = asset($product->image);
//            dd($product);
            $cart[$key]['product'] = $product;
            $cart[$key]['quantity'] = $item['quantity'];
        }
//        dd($cart);
        return json_encode($cart);
    }


    public function addProduct()
    {
        $id = $_GET["id"];

        if (session("order.$id")) {
            session(["order.$id.quantity"=>session("order.$id.quantity")+1]);
        } else {
            session(["order.$id.quantity"=>1]);
        }
//        $product = session("order.$id");
//        $quantity = session("order.$id.quantity");
        $orders = session('order');

//        dd($orders);
//        dd($orders);
        $cart = [];
        foreach($orders as $key => $item) {

            $product = Product::findorFail($key);
            $product->image = asset($product->image);
//            dd($product);
            $cart[$key]['product'] = $product;
            $cart[$key]['quantity'] = $item['quantity'];
        }

//        die('1234');
//        dd($result);
//        dd($orders);
        return json_encode($cart);

//        return response()->json([
//            'cart' => json_encode($cart)
//        ]);

    }
    public function deleteProduct()
    {

        $id = 0;
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        }
//        return json_encode($id);
        if(session()->has("order.$id")) {
            session()->forget("order.$id");
        }
        return response()->json([
           'status' => true
        ], 200);
    }

    public function createOrder($data)
    {
        $order = new Order();
        $orderdetail = new OrderDetail();
        $user = Auth::user();
        $order->customerID = $user->id;
        $order->status = "Đang xử lý";
        $order->save();
    }
}
