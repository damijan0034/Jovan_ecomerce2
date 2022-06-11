@extends('layouts.app')
@section("content")
<div class="custom-product">
     <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>
            @foreach($carts as $cart)
            <div class=" row searched-item cart-list-devider">
             <div class="col-md-5">
                <a href="detail/{{$cart->id}}">
                    <img  class="trending-image m-3" src="/images/{{$cart->product->gallery}}">
                  </a>
             </div>
             <div class="col-md-4">
                    <div class="">
                      <h2>{{$cart->product->name}}</h2>
                      <h5>{{$cart->product->description}}</h5>
                    </div>
             </div>
             <div class="col-md-3">
               <form action="{{ route('cartdelete',[$cart]) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-warning">Remove to cart</button>
            </form>
             </div>
            </div>
            @endforeach
          </div>
          <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>

     </div>
</div>
@endsection 