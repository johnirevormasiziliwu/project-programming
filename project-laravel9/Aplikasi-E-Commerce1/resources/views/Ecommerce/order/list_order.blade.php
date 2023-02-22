@extends('main.main')

@section('contenct')

<div class="container">
  <div class="card">
    <div class="card-header">{{ __('Orders') }}</div>
    <div class="card-columns ml-3 mt-3 mb-3">
      @foreach ($orders as $order)
      <div class="card " style="width: 20rem;">
          <div class="card-body">
              <a href="{{ route('show_order', $order) }}">
                  <h5 class="card-title">Order ID {{ $order->id }}</h5>
              </a>
              <h6 class="card-subtitle mb-2 text-muted">By {{ $order->user->name }}</h6>

              @if ($order->is_paid == true)
                  <button class="btn btn-success btn-sm ">
                    <i class="fa-solid fa-check text-bold "></i>
                    Paid
                </button>
              @else
                  <button class="btn btn-danger btn-sm">
                    <i class="fa-solid fa-xmark"></i>
                    Unpaid
                </button>
                  @if ($order->payment_receipt)
                      <div class="d-flex flew-row justify-content-around">
                          <a href="{{ url('storage/' . $order->payment_receipt) }} "
                              class="btn btn-primary">Show payment
                              receipt</a>
                          @if (Auth::user()->is_admin)
                              <form action="{{ route('confirm_payment', $order) }}" method="post">
                                  @csrf
                                  <button class="btn btn-success" type="submit">Confirm</button>
                              </form>
                          @endif
                      </div>
                  @endif
              @endif
          </div>
      </div>
  @endforeach
    </div>
  </div>
</div>


    
@endsection