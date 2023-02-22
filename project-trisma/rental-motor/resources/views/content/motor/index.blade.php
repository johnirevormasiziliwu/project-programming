@extends('home.index')

@section('container')
<section class="content">
 
   <div class="card">
      <div class="card-header bg-primary  ">
         <h3 class="text-white text-center font-weight-bold">Data Motor</h3>
      </div>
      <div class="card-body text-center">
       <a href="{{ route('create_motor') }}" class="btn btn-success mb-3 float-right">
         <i class='bx bxs-plus-circle'></i>
         Tambah Data Motor
       </a>
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Nomor</th>
                  <th>Nama Motor</th>
                  <th>Jenis Motor</th>
                  <th>Harga Motor</th>
                  <th>Action</th>
               </tr>
            </thead>
            @php($nomor=1)
            @foreach ($motors as $motor)
                <tbody>
                  <tr>
                     <td>{{ $nomor++ }}</td>
                     <td>{{ $motor->nama }}</td>
                     <td>{{ $motor->jenis_motor }}</td>
                     <td>{{ $motor->harga }}</td>
                     <td>
                        <a href="{{ route('edit_motor', $motor) }}" class="btn btn-warning btn-sm">
                           <i class='bx bx-edit'></i>
                           Ubah
                        </a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $motor->id }}">
                           <i class='bx bxs-trash'></i>
                          Hapus
                         </button>
                       
                     </td>
                  </tr>
                </tbody>
            @endforeach
         </table>
      </div>
   </div>
 
</section>

 
 <!-- Modal -->
 @foreach ($motors as $motor)
     
 <div class="modal fade" id="delete{{ $motor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header bg-danger ">
          <h5 class="modal-title text-white" id="exampleModalLabel">Anda Yakin Hapus Data Ini ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class='bx bx-arrow-back'></i>
            Batal
         </button>
          <button type="sumbit" class="btn btn-danger">
            <i class="bx bxs-trash"></i>
            Yakin, Hapus
         </button>
         </div>
      </div>
   </div>
</div>

@endforeach


@endsection