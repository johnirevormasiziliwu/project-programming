@extends('main.main')

@section('contenct')
    <div class="card">
      <div class="card-header">
        <h2 class="text-center text-bold">EDIT PRODUCT</h2>
      </div>
      <form action="{{ route('update_product', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
          <div class="row">
            <div class="col">
              <label for="name">Name Product</label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old ('name', $product->name) }}">

              @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror

            </div>
            <div class="col">
              <label for="price">Price Product</label>
              <input type="number" min="1" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old ('price', $product->price ) }}">

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
              <input type="number" min="1" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old ('stock', $product->stock ) }}">

              @error('stock')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror

            </div>
            <div class="col">
             <div class="row">
              <div class="col">
               <label for="image" class="form-label mt-3">Product image</label>
                <input type="hidden" name="oldImage" value="{{ $product->image }}">

                @if ($product->image)
                <img src="{{ url('storage/' . $product->image) }}" class="img-preview img-fluid mb-3  d-block">
                @else
                   <img class="img-preview img-fluid mb-3 col-sm-5"> 
                @endif
               
              </div>
              <div class="col">
                <label for="image" class="mt-3">Upload Image</label>
                <input type="file" class="form-control @error ('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()" >

                @error('image')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
             </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="description" class="mt-3">Description Product</label>
              <textarea name="description" id="description" cols="10" rows="5" class="form-control">{{ $product->description }}</textarea>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <a href="{{ route('list_product') }}" class="btn btn-outline-primary">Back</a>
          <button class="btn btn-outline-warning ml-3">Upadte Product</button>
        </div>
      </form>
    </div>




    <!-- Script untuk image -->
    <script>
      function previewImage() {
        const image = document.querySelector('#image');

        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
          imgPreview.src = oFREvent.target.result;
        }
      }
    </script>
@endsection