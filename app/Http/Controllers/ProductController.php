<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
     //
     function index()
     {
       
        if (request()->category) {
            $category=request()->category;
            $data=Product::where('category',$category)->get();
        }
        else{
            $data=Product::all();
        }

       
    //    $query= Product::latest()->get();
    //    if (request()->category) {
    //         $category=request()->category;
    //         $query->where('category',$category);
    //    }
    //    $data=$query;
          
         $categories=Category::get()->toTree();

        
 
        return view('product.index',['products'=>$data,'categories'=>$categories]);
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

     public function ordernow($id)
     {
        $product=Product::find($id);
        $amount =$product->price;
        
        return view('product.ordernow',compact('amount','product'));
     }

     function orderPlace(Request $req)
    {
        $userId=Auth::user()->id;
         $allCart= Cart::where('user_id',$userId)->get();
         foreach($allCart as $cart)
         {
             $order= new Order();
             $order->product_id=$cart['product_id'];
             $order->user_id=$cart['user_id'];
             $order->status="pending";
             $order->payment_method=$req->input('payment_method');
             $order->payment_status="pending";
             $order->address=$req->input('address');
             $order->save();
             
            $cart->delete(); 
         }
        //  $req->input();
         return redirect(route('payment'));
    }
}
