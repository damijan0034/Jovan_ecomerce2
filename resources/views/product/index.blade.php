@extends('layouts.app')
@section('content')
<div class="container">
  @if (session('message'))
  <div class="alert alert-success">{{ session('message') }}</div>


  @endif
  <div class="row">
    <div class="col-md-3">
      
    <div class="btn-group btn-group-vertical" role="group" aria-label="Button group with nested dropdown">
      <a type="button" class=" btn btn-secondary">KOMPJUTERI</a>
      <button type="button" class="btn btn-secondary">TABLETI</button>
    
      <div class="btn-group dropend " role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-hover btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          KOMPONENTE ZA NOTEBOOK
        </button>
        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
          <li><a class="dropdown-item" href="#">Dropdown link</a></li>
          <li><a class="dropdown-item" href="#">Dropdown link</a></li>
        </ul>
      </div>

      <div class="btn-group dropend " role="group">
        <button id="btnGroupDrop1" type="button" class="btn  btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          MONITORI
        </button>
        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
          <li><a class="dropdown-item" href="#">9"</a></li>
          <li><a class="dropdown-item" href="#">14"</a></li>
        </ul>
      </div>
    </div>
       
      

  </div>
  <div class="col-md-9">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">

        <div class="carousel-item active">
          <img src="{{ url('/images/phone.jpg') }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ url('/images/phone2.jpg') }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ url('/images/phone3.jpg') }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    @foreach ($products as $product)


    <a href="{{ route('product.show',[$product]) }}">
      <img width="100" height="70" src="/storage/{{ $product->gallery }}" class="img-thumbnail m-1 mt-2" alt="...">
    </a>



    @endforeach

  </div>
</div>
</div>


@endsection