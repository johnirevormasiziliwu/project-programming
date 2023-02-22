@extends('main.main')

@section('contenct')
  <div class="card ">
    <div class="card-header">
      <h3 class="text-center text-bold">ADD NEW PRODUCT</h3>
    </div>
    <form action="{{ route('store_product') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
              <div class="row">
                <div class="col">
                  <label for="name">Name Product</label>
                  <input type="text" class="form-control @error('name') is-invalid
                      
                  @enderror" value="{{ old('name') }}" name="name" id="name" autofocus placeholder="Name Product" >

                   @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col">
                  <label for="price">Price Product</label>
                  <input type="number" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" name="price" id="price" min="1" placeholder="Price Product (minimal 1)">

                  @error('price')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror

                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="stock" class="mt-3">Stock Product</label>
                  <input type="number" class="form-control @error('stock') is-invalid @enderror " value="{{ old('stock') }}" name="stock" id="stock" placeholder="Stock Product">

                  @error('stock')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror

                </div>
                <div class="col">
                  <label for="image" class="mt-3">Image Product</label>
                  <input type="file" class="form-control @error ('image') is-invalid @enderror" value="{{ old('image') }}" name="image" id="image">
                  
                  @error('image')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror

                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="description" class="mt-3">Description Product</label>
                  <textarea name="description" class="form-control @error ('description') is-invalid  @enderror"  id="description" cols="15" rows="5"></textarea>
                  @error('description')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  
                </div>
              </div>
          </div>
          <div class="card-footer">
            <a href="{{ route('list_product') }}" class="btn btn-outline-primary">
                <i class="fa-regular fa-reply"></i>
                Back
            </a>
            <button class="btn btn-outline-success ml-5">
                <i class="fa-regular fa-floppy-disk">
                    
                </i>
                Save Product
            </button>
          </div>
      
    </form>
  </div>
  
@endsection