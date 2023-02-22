@extends('main.main')

@section('contenct')
    <section class="container">
      <div class="card">
        <div class="card-header">
          <h3 class="my-1 text-center text-bold">Edit Profile</h3>
        </div>
       <form action="{{ route('update_profile') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control col-5">
          </div>
          <div class="form-group">
            <label for="email">Name</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control col-5">
          </div>
          <div class="form-group">
            <label for="username">Name</label>
            <input type="text" name="username" value="{{ $user->username }}" class="form-control col-5">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password"  class="form-control col-5">
          </div>
          <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation"  class="form-control col-5">
          </div>
        </div>
        <div class="card-footer">
          <a href="{{ route('show_profile') }}" class="btn btn-primary btn-sm">Back</a>
          <button type="submit" class="btn btn-info btn-sm">Change Profile</button>
        </div>
      </form>
      </div>
    </section>
@endsection