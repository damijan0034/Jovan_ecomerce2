@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card " style="width: 28rem;">
                    <img class="card-img-top" src="/images/{{ $product->gallery }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{ $product->name }}</h5>
                      <p class="card-text">{{ $product->description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Price:{{ $product->price }}€</li>
                      <li class="list-group-item">Type:{{ $product->category }}</li>
                     
                    </ul>
                    <div class="card-body">
                      <a href="#" class="card-link">Card link</a>
                      <a href="{{ route('product.index') }}" class="card-link">Back</a>
                    </div>
                  </div>
            </div>
        </div>
       
    </div>
@endsection