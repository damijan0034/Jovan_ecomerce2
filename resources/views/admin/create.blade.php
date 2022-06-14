@extends('layouts.app')

@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-6 offset-md-3">
               <h1>Create new product</h1>
            <form enctype="multipart/form-data" method="post" action="{{ route('product.store') }}">
              @csrf
              
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="@error('name')
                    is-invalid
                  @enderror form-control" value="{{ old('name','') }}"  placeholder="Enter name">
                  @error('name')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                 
                </div>
                <br>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="@error('price')
                      is-invalid
                    @enderror form-control" value="{{ old('price','') }}"  placeholder="Enter price">
                    @error('price')
                       <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                   
                  </div>

                  <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" name="category" class="@error('category')
                      is-invalid
                    @enderror form-control" value="{{ old('category','') }}"  placeholder="Enter category">
                    @error('category')
                       <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                   
                  </div>

                <div class="form-group">
                    <label  for="description">Description</label>
                    <textarea class="@error('description')
                      is-invalid
                    @enderror form-control" name="description"  cols="30" rows="5">{{ old('descriotion','') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <br>
                
             

                <div class="form-group">
                  <label for="gallery">Gallery</label>
                  <input type="file" name="gallery" >
                 
                </div>
                <br>
               
                <button  type="submit" class="btn btn-primary form-control">Save</button>
              </form>
           </div>
       </div>
   </div>
@endsection