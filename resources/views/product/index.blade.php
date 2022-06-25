@extends('layouts.app')
@section('content')
<div class="container">
  @if (session('message'))
  <div class="alert alert-success alert-dismissible show" role="alert">{{ session('message') }}</div>


  @endif
  <div class="row">
    <div class="col-md-3">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
          data-bs-toggle="dropdown" aria-expanded="false">
          <a style="text-decoration: none;color:whitesmoke" href="{{ route('product.index') }}"> Elektricni Uredjaji</a>
         
        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
          @foreach ($categories as $category)
          <li>
            <a class="dropdown-item" href="{{ route('product.index',['category'=> $category->category_name]) }}">
              {{ $category->category_name }}
            </a>
            <ul class="dropdown-menu dropdown-submenu dropdown-menu-dark">
              @foreach ($category->children as $cats)
              <li>
                <a class="dropdown-item" href="{{ route('product.index',['category'=> $cats->category_name]) }}">{{
                  $cats->category_name }}</a>
             
              <ul class="dropdown-menu dropdown-submenu dropdown-menu-dark">
                @foreach ($cats->children as $cat)
                <li>
                  <a class="dropdown-item" href="{{ route('product.index',['category'=> $cat->category_name]) }}">{{ $cat->category_name }}</a>
                </li>
                @endforeach
              </ul>
              </li>
              @endforeach
            </ul>  
         

        


        </li>
          
          @endforeach



        </ul>
      </div>
    </div>

    <div class="col-md-9">
        @foreach ($products as $product)
        <div class="row">
          <div class="col-2">
            <a href="{{ route('product.show',[$product]) }}">
              <img width="100" height="70" src="/storage/{{ $product->gallery }}" class="img-thumbnail m-1 mt-2" alt="...">
            </a>
        
          </div>
          <div class="col-6">
              <h1>{{ $product->name }}</h1>
              <p>{{ $product->description }}</p>
              <h6>{{ $product->category }}</h6>
          </div>
          <div class="col-2">
            <h2>{{ $product->price }}€</h2>
          </div>
          <div class="col-2"></div>

         </div>
         <hr>
        @endforeach
         
       

    </div>
    

  </div>
</div>
</div>


@endsection