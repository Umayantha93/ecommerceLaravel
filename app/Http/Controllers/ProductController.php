<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\DB;
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

    function cartList()
    {   
        $userId = Session::get('user')['id'];
        // error_log("blu blu");
        $products = DB::table('cart')->join('products', 'cart.product_id', '=', 'products.id')
        ->where('cart.user_id', $userId)
        ->select('products.*')
        ->get();
        
        return view('cartlist', ['products'=>$products]);
    }

    public function storePorducts()
    {
        $dataValidate = $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'quantity' => 'required',
            'category_one' => 'required',
            'category_two' => 'required',
            'price' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/image/', $name);
                $data[] = $name;
            }

        }

        $product_upload = new Product;
        $product_upload->product_name = $request->input['product_name'];
        $product_upload->product_code = $request->input['product_code'];
        $product_upload->quantity = $request->input['quantity'];
        $product_upload->category_one = $request->input['category_one'];
        $product_upload->category_two = $request->input['category_two'];
        $product_upload->price = $request->input['price'];
        $product_upload->images = json_encode($data);
        $product_upload->save();
        return redirect('/');

    }
    public function Dashboard(){
        return view('dashboard');
    }
}
