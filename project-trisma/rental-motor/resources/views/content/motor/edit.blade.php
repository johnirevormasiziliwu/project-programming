@extends('home.index')

@section('container')
 <section class="content">
   <div class="card">
      <div class="card-header bg-primary text-white text-bold text-center">
         <h3 class="font-weight-bold">Edit Data Motor</h3>
      </div>
      <form action="{{ route('update_motor', $motor) }}" method="POST">
         @csrf
         @method('put')
         <div class="card-body">
            <div class="from-group">
               <label for="nama" class="font-weight-bold text-lg">Nama Motor</label>
               <input type="text" name="nama" class="form-control @error ('nama') is-invalid @enderror" id="nama" value="{{ old('name',$motor->nama)  }}" placeholder="Nama Motor">
               @error('nama')
                   <div class="invalid-feedback">
                     {{ $message }}
                   </div>
               @enderror
            </div>
            <div class="from-group mt-3">
               <label for="jenis_motor" class="font-weight-bold text-lg" >Jenis Motor</label>
               <input type="text" name="jenis_motor" class="form-control  @error ('jenis_motor') is-invalid @enderror" id="jenis_motor" value="{{ old('jenis_motor', $motor->jenis_motor) }}" placeholder="Jenis Motor">
               @error('jenis_motor')
               <div class="invalid-feedback">
                 {{ $message }}
               </div>
           @enderror
            </div>
            <div class="from-group mt-3">
               <label for="harga" class="font-weight-bold text-lg">Harga Motor</label>
               <input type="number" name="harga" class="form-control @error ('harga') is-invalid @enderror" value="{{ old('harga', $motor->harga) }}" id="harga" placeholder="Harga Motor">
            </div>
            @error('harga')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
         </div>
         <div class="card-footer">
            <a href="{{ route('list_motor') }}" class="btn btn-info">
               <i class='bx bx-arrow-back'></i>
               Kembali</a>
            <button type="submit" class="btn btn-warning">
               <i class='bx bx-edit'></i>
               Ubah Data Motor
            </button>
         </div>
      </form>
   </div>
 </section>
@endsection