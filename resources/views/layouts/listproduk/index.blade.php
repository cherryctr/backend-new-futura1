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
              <div class="card-header">
                <a class="btn btn-primary" href="{{ route('admin.produk.create') }}">Tambah Satuan</a>
                <a class="btn btn-primary" href="{{ route('admin.produk.create') }}">Tambah banyak</a>
              </div>
              <!-- /.card-header -->

              <div class="card-body">

                <table id="example2" class="table table-bordered table-striped">

                  <thead>
                  <tr>
                    <th>No </th>
                    <th>Gambar </th>
                    <th>Judul</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; ?>
                  @foreach ($produkid as $produk)

                  <tr>
                    <td>{{ $i;  }}</td>
                    <td><img src="{{ $produk->thumbnail }}" alt="" style="width:100px; height:100px"></td>
                    <td>{{ $produk->title }}</td>
                    <td>{{ $produk->harga }}</td>
                    <td>

                      <a href="{{ route('admin.produk.edit', $produk->id) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil-alt"></i>
                      </a>

                     <!-- Delete button -->
                      <form method="post" action="{{ route('produk.delete', ['id' => $produk->id]) }}">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this product?')"><i class="fa fa-trash "></i></button>
                      </form>
                    </td>
                  </tr>
                  <?php $i++;  ?>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No </th>
                    <th>Gambar </th>
                    <th>Judul</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
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

<script>
    //ajax delete
    function Delete(id) {
        var id = id;
        var token = $("meta[name='csrf-token']").attr("content");
        alert(token);
        alert(id);

        swal({
            title: "APAKAH KAMU YAKIN ?",
            text: "INGIN MENGHAPUS DATA INI!",
            icon: "warning",
            buttons: [
                'TIDAK',
                'YA'
            ],
            dangerMode: true,
        }).then(function (isConfirm) {
            if (isConfirm) {

                //ajax delete
                jQuery.ajax({
                    url: "/admin/produk/" + id,
                    data: {
                        "id": id,
                        "_token": token
                    },


                    type: 'DELETE',

                    success: function (response) {
                        if (response.status == "success") {
                            swal({
                                title: 'BERHASIL!',
                                text: 'DATA BERHASIL DIHAPUS!',
                                icon: 'success',
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            swal({
                                title: 'GAGAL!',
                                text: 'DATA GAGAL DIHAPUS!',
                                icon: 'error',
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function () {
                                location.reload();
                            });
                        }
                    }
                });

            } else {
                return true;
            }
        })
    }
</script>
</body>
@endsection
