@extends('main.main')

@section('contenct')
    <div class="card">
      <div class="card-header">
        <h3 class="my-1 text-center text-bold">My Profile</h3>
      </div>
      <div class="card-body ml-5">
      <div class="row">
        <div class="col-2 mt-2">
          <h5 class="text-bold">Name : </h5>
        </div>
        <div class="col-6">
          <input value="{{ $user->name }}"  class="form-control text-bold">
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-2 mt-2">
          <h5 class="text-bold">Email : </h5>
        </div>
        <div class="col-6">
          <input value="{{ $user->email }}"  class="form-control text-bold">
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-2 mt-2">
          <h5 class="text-bold">Username : </h5>
        </div>
        <div class="col-6">
          <input value="{{ $user->username }}"  class="form-control text-bold mr-5">
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-2 mt-2">
          <h5 class="text-bold">Role : </h5>
        </div>
        <div class="col-6">
          <input type="role" value="{{ $user->is_admin ?  'Admin' : 'Member' }}"  class="form-control text-bold mr-5">
        </div>
      </div>
      </div>
      <div class="card-footer">
      
        <a href="{{ route('edit_profile') }}" class="btn btn-info btn-sm">Update Profile</a>
      </div>
    </div>
@endsection

