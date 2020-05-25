<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Order;
use App\OrderDetail;
use App\Post;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index()
    {
        if(!session()->has('order'))
        {
            return view('shop.noCart' , [
                'statusOforder' => 'Giỏ hàng hiện tại không có sản phẩm nào',
                'thankyou' => 'Mời bạn quay lại trang chủ để tiến hành mua hàng',
            ]);
        }


//        session()->forget('order');
        $orders = session('order');
//        dd($orders);
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
            'result' => $result,
            'statusOforder' => '',
            'thankyou' => '',
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

    public function createOrder()
    {
//        $order = new Order();
//        $orderdetail = new OrderDetail();
//        $user = Auth::user();
//        $order->customerID = $user->id;
//        $order->status = "Đang xử lý";
//        $order->save();
    }

    public function checkOut()
    {

        session_start();
        $total = $_SESSION["total"];
        if(!session()->has('order') || !Auth::check()) {
            redirect('/');
        }

        $cart = session('order');
//        dd($cart);
        $user = Auth::user();
//        dd($user);
        $order = new Order();
        $order->fullname = $user->name;
        $order->phone = $user->phone;
        $order->email = $user->email;
        $order->address = $user->address;
        $order->total = $total;
        $order->member_id = $user->id;
        $order->order_status_id = 1; // 1 = mới
        if($order->save()) {

            $order->code = 'DH-'.$order->id.'-'.date('d').date('m').date('Y');
            $order->save();
            foreach($cart as $key => $item) {

                $product = Product::findorFail($key);
                $_detail = new OrderDetail();
                $_detail->name = $product->name;
                $_detail->image = $product->image;
                $_detail->sku = $product->sku;
                $_detail->user_id = $product->user_id;
                $_detail->order_id = $order->id;
                $_detail->product_id = $product->id;
                $_detail->qty = $item['quantity'];
                $_detail->price = $product->price;
//                dd($_detail);
                $_detail->save();
//                dd("die1234");
            }
        }


        session()->forget('order');
        return view('shop.noCart' , [
            'statusOforder' => 'Đã tiến hành thanh toán thành công',
            'thankyou' => 'Cảm ơn quý khách đã tin dùng sản phẩm của chúng tôi',
        ]);



    }




}
