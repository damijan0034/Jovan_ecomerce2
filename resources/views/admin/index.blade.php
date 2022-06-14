@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center">Admin Section</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th>Gallery</th>
                <th>Actions</th>
                <th>
                    <a href="{{ route('product.create') }}" class="btn btn-primary">New Product</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allProducts as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category }}</td>
                <td><a href="{{ route('product.show',[$product]) }}"><img height="60" width="100" src="/storage/{{ $product->gallery }}" alt=""></td></a> 
                <td>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('product.edit',[$product]) }}" class="btn btn-sm btn-warning">Edit</a>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('product.destroy',[$product]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
           
            @endforeach


        </tbody>
    </table>
</div>
@endsection