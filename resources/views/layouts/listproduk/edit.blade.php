@extends('layouts.app2')
@section('content')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('header.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('header.mainsidebar')
  <!-- /. Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          

            <div class="card">
              
              <!-- /.card-header -->
              
              <div class="card-body">
                
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                     <form action="{{ route('admin.produk.update', $produkid->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Type</label>
                                <input type="text" name="type" class="form-control @error('type') is-invalid @enderror " id="exampleInputEmail1" placeholder="Enter Type" value="{{ $produkid->type; }}">

                                  @error('type')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Type Property</label>
                                <input type="text" name="type_property" class="form-control @error('type_property') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Type Property" value="{{ $produkid->type_property; }}">

                                  @error('type_property')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Market</label>
                                <input type="text" name="market" class="form-control @error('market') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Market" value="{{ $produkid->market; }}">

                                 @error('market')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Title" value="{{ $produkid->title; }}">

                                @error('title')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Area</label>
                                <input type="text" name="area" class="form-control @error('area') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Area" value="{{ $produkid->area; }}">

                                @error('area')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Luas Bangunan</label>
                               <input type="text" name="luas_bangunan" class="form-control @error('luas_bangunan') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Luas Bangunan" value="{{ $produkid->luas_bangunan; }}">

                                @error('luas_bangunan')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Luas Keseluruhan</label>
                               <input type="text" name="luas_keseluruhan" class="form-control @error('luas_keseluruhan') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Luas Keseluruhan" value="{{ $produkid->luas_keseluruhan; }}">

                                @error('luas_keseluruhan')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">kamar tidur</label>
                              <input type="text" name="kamar_tidur" class="form-control @error('kamar_tidur') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter kamar_tidur" value="{{ $produkid->kamar_tidur; }}">

                                @error('kamar_tidur')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">kamar mandi</label>
                               <input type="text" name="kamar_mandi" class="form-control @error('kamar_mandi') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter kamar_mandi" value="{{ $produkid->kamar_mandi; }}">

                                @error('kamar_mandi')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Lantai</label>
                                <input type="text" name="lantai" class="form-control @error('lantai') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter lantai" value="{{ $produkid->lantai; }}">

                                @error('lantai')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Sertifikat</label>
                               <input type="text" name="sertifikat" class="form-control @error('Sertifikat') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Sertifikat" value="{{ $produkid->sertifikat; }}">

                                @error('sertifikat')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Pemandangan</label>
                                <input type="text" name="pemandangan" class="form-control @error('pemandangan') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter pemandangan" value="{{ $produkid->pemandangan; }}">

                                @error('pemandangan')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Listrik</label>
                                <input type="text" name="listrik" class="form-control @error('listrik') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter listrik" value="{{ $produkid->listrik; }}">

                                @error('listrik')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Furnish</label>
                                 <input type="text" name="furnish" class="form-control @error('furnish') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter furnish" value="{{ $produkid->furnish; }}">

                                @error('furnish')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">air</label>
                                <input type="text" name="air" class="form-control @error('air') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter air" value="{{ $produkid->air; }}">

                                @error('air')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">harga</label>
                                 <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Harga" value="{{ $produkid->harga; }}">

                                @error('harga')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <img src="{{ $produkid->thumbnail }}" alt="">
                                <label>GAMBAR</label>
                                <input type="file" name="thumbnail" class="form-control">
                            </div>

                             <div class="form-group">
                               <label for="exampleInputEmail1">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" cols="30" rows="10">{{ $produkid->deskripsi; }}</textarea>
                            </div>
                            <input type="text" name="thumbnail_old" value="{{ $produkid->thumbnail }}">
                           
                              
                       
                        </div>
                        <!-- /.card-body -->
                        

                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            </div>
            <!-- /.card -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
  @include('footer.footer')


</div>
</body>
@endsection