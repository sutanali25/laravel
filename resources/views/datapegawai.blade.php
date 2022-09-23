@extends('layout.admin')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h5 class="m-0"><a href="index3.html" class="nav-link">Selamat datang, <i>{{Auth::user()->name}} </i> pada aplikasi pegawai </a>
  </h5>
              </div><!-- /.col -->
              
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
  
        <div class="container">
      
      <a href="/tambahpegawai" class="btn btn-success">Tambah +</a>
  
      <!-- search -->
      
      <div class="row g-3 align-items-center mt-2"> 
      
  
     <div class="col-auto">
      <form action="/pegawai" method="GET">
      <input type="search" id="inputPassword6" name="search" class="form-control" placeholder="Cari data !" aria-describedby="passwordHelpInline">
      </form>
     </div>
  
     <div class="col-auto">
      <a href="/exportexcel" class="btn btn-success"> Export Excel</a>
  
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Import data excel
    </button>
    </div>
  
  
  
    <!-- import excel -->
  
  
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import data excel</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
    <form action="/importexcel" method="POST" enctype="multipart/form-data">
    @csrf
  
  
  
  
        
        <div class="modal-body">
        <div class="form-group">
          <input type="file" name="file" require>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Import data</button>
        </div>
      </div>
      </form>
    </div>
    </div>
  
  
  
    <!-- tutup export excel-->
    </div>
  
    <!-- tutup search -->
      <div class="row">
  
      <!-- @if ($message = Session::get('success'))
      <div class="alert alert-success" role="alert">
      {{$message}}
      </div>
      
      @endif -->
  
      <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Foto</th>
        
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">No Telepon</th>
        <th scope="col">Dibuat</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @php
      $no = 1;
      @endphp
      @foreach ($data as $index => $row)
      <tr>
        <th scope="row">{{ $index + $data->firstItem() }}</th>
       
        <td>{{ $row->nama }}</td>
        <td>
        <img src="{{asset('gambarpegawai/'.$row->foto)}}" alt="" style="width: 40px;">
  
        </td>
        <td>{{ $row->jeniskelamin }}</td>
        <td>0{{ $row->notelpon }}</td>
        <td>{{ $row->created_at->diffForhumans() }}</td>
        <td>
        
      <a href="/tampilkandata/{{$row->id}}" class="btn btn-info">Edit</a>
      <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</a>
    </td>
      </tr>
      @endforeach
      
      
    </tbody>
    </table>
    {{ $data->links() }}
      </div>
      
      </div>
        
  </div>

</div>

@endsection

@push('script')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>

  <script>
  $('.delete').click(function(){ 

    var pegawaiid = $(this).attr('data-id'); 
    var nama = $(this).attr('data-nama'); 


    swal({
  title: "Apakah kamu yakin?",
  text: "Mau menghapus data Pegawai dengan nama "+nama+"",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  
  if (willDelete) {
    window.location ="/delete/"+pegawaiid+""
    swal("Data berhasil dihapus !", {
      icon: "success",
    });
  } else {
    swal("Data tidak dihapus !");
  }

  
});
});
  
  </script>

  <script>
    @if (Session::has('success'))

toastr.success("{{ Session::get('success') }}")
@endif
  </script>


@endpush