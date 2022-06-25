@extends('layouts.app')

@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-6 offset-md-3">
               <h1>Edit product</h1>
            <form enctype="multipart/form-data" method="post" action="{{ route('product.update',[$product]) }}">
              @csrf
              @method('put')
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="@error('name')
                    is-invalid
                  @enderror form-control" value="{{ old('name',$product->name) }}"  placeholder="Enter name">
                  @error('name')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                 
                </div>
                <br>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="@error('price')
                      is-invalid
                    @enderror form-control" value="{{ old('price',$product->price) }}"  placeholder="Enter price">
                    @error('price')
                       <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                   
                  </div>

                  <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control @error('category') is-invalid @enderror" name="category" >
                        <option value="">--select category--</option>
                       <option {{ old('category',$product->category) == 'kompjuteri' ? 'selected' : '' }} value="kompjuteri">kompjuteri</option>
                        <option {{ old('category',$product->category) == 'telefoni' ? 'selected' : '' }} value="telefoni">telefoni</option>
                        <option {{ old('category',$product->category) == 'delovi-za-kompjuter' ? 'selected' : '' }} value="delovi-za-kompjuter">delovi za kompjuter</option>
                        <option {{ old('category',$product->category) == 'laptopovi' ? 'selected' : '' }} value="laptopovi">laptopovi</option>
                        <option {{ old('category',$product->category) == 'maticne-ploce' ? 'selected' : '' }} value="maticne-ploce">maticne ploce</option>
                        <option {{ old('category',$product->category) == 'monitori' ? 'selected' : '' }} value="monitori">monitori</option>
                        <option {{ old('category',$product->category) == 'tableti' ? 'selected' : '' }} value="tableti">tableti</option>
                        <option {{ old('category',$product->category) == 'desktop' ? 'selected' : '' }} value="desktop">desktop</option>
                    </select>
                    @error('category')
                    <p class="text-danger"> {{ $message }}</p>   
                   @enderror
                </div>

                <div class="form-group">
                    <label  for="description">Description</label>
                    <textarea class="@error('description')
                      is-invalid
                    @enderror form-control" name="description"  cols="30" rows="5">{{ old('descriotion',$product->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <br>
                
             

                <div class="form-group">
                  <label for="gallery">Gallery</label>
                  <input type="file" name="gallery" ><br>
                 <img width="70" height="40" src="/storage/{{ $product->gallery }}" alt="">
                </div>
                <br>
               
                <button  type="submit" class="btn btn-primary form-control">Update</button>
              </form>
           </div>
       </div>
   </div>
@endsection