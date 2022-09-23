@extends('layout.admin')

@section('content')

<body>
    <h1 class="text-center mb-5">Tambah Data Pegawai</h1>

    <div class="container">
   

    <div class="row justify-content-center">
    <div class="col-8">
      <div class="card">
    <div class="card-body">
        <form action="/insertdata" method="POST" enctype="multipart/form-data">
          @csrf
          
            <legend>Input data baru !</legend>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" id="" class="form-control" placeholder="Masukan nama lengkap anda...">
            </div>
            
           
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Jenis Kelamin</label>

              <select class="form-select" name="jeniskelamin" aria-label="Floating label select example">
                <option selected>Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
                
              </select>
              
         </div>

            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Nomor Telpon</label>
              <input type="number" name="notelpon" id="" class="form-control" placeholder="Masukan nama lengkap anda...">
            </div>

            <div class="mb-3">
              <label for="exampleInput" class="form-label">Upload Foto</label>
              <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
          
        </form>

      </div>
    </div>
  </div>
  </table>
    </div>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

@endsection