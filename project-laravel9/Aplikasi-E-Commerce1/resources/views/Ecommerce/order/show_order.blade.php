
@extends('main.main')

@section('contenct')

@php
$total_price = 0;
@endphp

<div class="container">
  <div class="card">
    <div class="card-header">{{ __('Order Detail') }}</div>
    <div class="card-body">
      <h5 class="card-title">Order ID {{ $order->id }}</h5>
      <h6 class="card-subtitle mb-2 text-muted">By {{ $order->user->name }}</h6>

      @if ($order->is_paid == true)
          <button class="btn btn-sm btn-success text-bold text-lg">
            <i class="fa-solid fa-check text-lg"></i>
            Paid
          </button>
      @else
          <button class="btn btn-danger btn-sm">
            <i class="fa-solid fa-xmark"></i>
            Unpaid
          </button>
      @endif
      <hr>
      @foreach ($order->transactions as $transaction)
          <p>{{ $transaction->product->name }} - {{ $transaction->amount }} pcs</p>
          @php
              $total_price += $transaction->product->price * $transaction->amount;
          @endphp
      @endforeach
      <hr>
      <h5 class="text-xl text-bold">Total: Rp. {{ $total_price }}</h5>
      <hr>

      @if ($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin)
          <form action="{{ route('sumbit_payment_order', $order) }}" method="post"
              enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label>Upload your payment receipt</label>
                  <input type="file" required name="payment_receipt" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary mt-3">Submit payment</button>
          </form>
      @endif
    </div>
    <div class="card-footer">
      <a href="{{ route('list_order') }}" class="btn btn-primary">Back</a>
    </div>
  </div>
</div>

@endsection

