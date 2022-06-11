<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     //
     function index()
     {
         $data= Product::all();
 
        return view('product.index',['products'=>$data]);
     }

     public function show(Product $product)
     {
         return view('product.show',compact('product'));
     }

     public function addToCart(Product $product)
     {
         Cart::create([
             'user_id'=>auth()->user()->id,
             'product_id'=>$product->id
         ]);

         
        
         return redirect('/',)->with('message','item added to cart');
     }

     static function cartNumber()
     {
       

        return  Cart::where('user_id',auth()->user()->id)->count();
     }

     public function cartList()
     {
         $carts=Cart::where('user_id',auth()->user()->id)->get();
         return view('product.cart_list',compact('carts'));
     }

     public function cartDelete(Cart $cart)
     {
         $cart->delete();

         
         return redirect('/')->with('message','item removed from cart');
     }

     public function search(Request $request)
     {
         $products=Product::where('name','like','%'.$request->input('query').'%')
                        ->get();
         return view('product.search',compact('products'));
     }
}
