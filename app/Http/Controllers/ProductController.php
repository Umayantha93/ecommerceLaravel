<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;

class ProductController extends Controller
{
    //
    function index(){

        $data = Product::all();
        return view('product', ['products'=> $data]);
    } 

    function detail($id)
    {

        $data = Product::find($id);
        return view('detail',['product'=>$data]);

    }

    function search(Request $request)
    {
        $data = Product::where('product_name', 'like', '%'.$request->input('query').'%')->get(); 
        return view('search', ['products'=>$data]);
    }

    function addToCart(Request $request)
    {
        if($request->session()->has('user')){
            $cart = new Cart;
            $cart->user_id=$request->session()->get('user')['id'];
            $cart->product_id=$request->product_id;
            $cart->save();
            return redirect('/');
        }
        else
        {
            return redirect('/login');
        }
    }
    static function cartItem()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }
}
