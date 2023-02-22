@extends('main.main')

@section('contenct')

@if($errors -> any())
<div class="alert alert-danger alert-dismissible fade show"
     role="alert">
    @foreach($errors->all() as $error)
    {{ $error }}
        <button type="button" class="close"
                data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
@endforeach
@endif

@if (session()->has('success'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@php
    $total_price = 0;
@endphp

    <section class="content">
        <div class="card card-solid">
            <div class="card-header">
               <div class="card-title">{{ __('Detail Cart') }}</div>
            </div>
            <div class="card-body ">
                @foreach ($carts as $cart)
                <div class="row">
                    <div class="col-4">
                        <img class="rounded-lg" src="{{ url('storage/' . $cart->product->image) }}" width="320px" height="320px" alt="">
                    </div>
                    <div class="col-8">
                        <h3 class="my-1">{{ $cart->product->name }}</h3>
                        <hr>
                        <p>{{ $cart->product->description }}</p>
                        <hr>
                        <p class="text-bold text-lg">Price : Rp.{{ $cart->product->price }}</p>
                        <hr>
                        <form action="{{ route('update_cart', $cart) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="col-12">
                                        <div>
                                            <label for="amount" class="mt-3" >Amount</label>
                                            <input type="number"  name="amount" id="amount" value="{{ $cart->amount }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="row mt-5">
                                        <div class="col-12 col-sm-6">
                                            <button class="btn btn-warning btn-sm" type="submit">Update Amount</button>
                                            
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <button type="button" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#delete">
                                        Delete Amount
                                      </button>
                                            
                                        </div>

                                    </div>
                                    
                                </div>
                                
                            </div>
                        </form>
                         @php
                            $total_price += $cart->product->price * $cart->amount;
                        @endphp
                        <h5 class="mt-5 text-bold text-xl "><u>Total: Rp.{{ $total_price }}</u></h5>
                    </div>
                </div>
                @endforeach
            </div>
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <div class="card-footer">
                    <a href="{{ route('list_product') }}" class="btn btn-primary">Back</a>
                    <button class="btn btn-info" type="submit"  @if ($carts->isEmpty()) disabled @endif>Checkout</button>
                </div>
            </form>
        </div>
    </section>


  

  
  <!-- Modal -->

  @foreach ($carts as $cart)
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you delete this data ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       <form action="{{ route('delete_cart', $cart) }}" method="POST">
        @csrf
        @method('delete')
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="sumbit" class="btn btn-danger">Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach
@endsection