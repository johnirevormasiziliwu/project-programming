@extends('main.main')

@section('contenct')

@if($errors -> any())
<div class="alert alert-danger alert-dismissible fade show"
     role="alert">
    @foreach($errors->all() as $error)
        {{$error}}
        <button type="button" class="close"
                data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
@endforeach
@endif
    
<div class="container">
    <div class="card">
        <div class="card-header ">
            <div class="card-title text-bold ">Detail Product :  {{ $product->name }}</div>
        </div>
          <div class="card-body">
              <div class="row">
                <div class="col-4">
                    <img class="rounded-lg"  src="{{ url('storage/' . $product->image) }}" width="300px" alt="">
                </div>
                 <div class="col-8">
                    <h4>{{ $product->name }}</h4>
                    <hr>
                    <h6>{{ $product->description }}</h6>
                    <hr>
                    <h5>Rp.{{ $product->price }}</h5>
                    <hr>
                    <h5>Stock: {{ $product->stock }}</h5>
                    <hr>

                    @if (!Auth::user()->is_admin)
                    <form action="{{ route('add_to_cart', $product) }}" method="POST">
                      @csrf
                      <label for="amount">Amount</label>
                      <div class="input-group">
                        <input type="number" value="1" name="amount" class="form-control col-5">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-outline-secondary" type="button">Add to cart</button>
                        </div>
                      </div>
                    </form>
                    @endif
                  </div>
              </div>
          </div>
    </div>
 </div>
@endsection
          