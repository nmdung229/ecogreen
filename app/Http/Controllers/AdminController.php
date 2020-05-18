<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    //
    public function index ()
    {
        return view('admin.dashboard');
    }
    public function getLogin()
    {
        if(Auth::check()) {
            $user= Auth::user();
//            dd($user);
//            dd("1234");
            return redirect('admin');
        } else {
            return view('admin.login');
        }

    }
    public function postLogin(Request $request){
//        dd($request);

        $email = $request->input('email');
        $password = $request->input('password');
        $login = [
            'email' => $email,
            'password' => $password
        ];
//        $password = Hash::make($password);
//        echo ($password);
//        die();
//        dd($login);

        if(Auth::attempt($login)){
            return redirect('admin');
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }
    public function  getLogout(){
        $role = Auth::user()->role_id;
        Auth::logout();
        if($role == 1) {
            return redirect()->route('getLogin');
        }
        else {
            return redirect()->route('shop.home');
        }
    }
}
