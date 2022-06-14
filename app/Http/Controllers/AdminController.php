<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allProducts=Product::all();
        
        return view('admin.index',compact('allProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'name'=>'required',
            'price'=>'required',
            'category'=>'required',
            'description'=>'required',
            'gallery'=>'mimes:png,jpg,jpeg'
        ]);

       $image=$request->file('gallery');
       $imageName=time() .'.'.$image->extension();
       $image->move(public_path('/storage'),$imageName);

        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'category'=>$request->category,
            'description'=>$request->description,
            'gallery'=>$imageName
        ]);
       

        return redirect(route('product.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product )
    {
        return view('admin.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'category'=>'required',
            'description'=>'required',
            'gallery'=>'mimes:png,jpg,jpeg'
        ]);

       $image=$request->file('gallery');
       $imageName=time() .'.'.$image->extension();
       $image->move(public_path('/storage'),$imageName);

    //    $product=new Product();

        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'category'=>$request->category,
            'description'=>$request->description,
            'gallery'=>$imageName
        ]);
        // $product->save();

        return redirect(route('product.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        
        $product->delete();

        return redirect(route('product.index'));
    }
}
