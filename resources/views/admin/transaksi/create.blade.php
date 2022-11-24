@extends('admin.layouts.app')

@section('content')

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
          <div class="row align-items-center">
              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                  <h4 class="page-title">Tambah Transaksi</h4>
              </div>
          </div>
          <!-- /.col-lg-12 -->
        </div>
      <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-9">
                        <div class="card">
                            <div class="card-body">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <form method="post" action="/admin/transaksi" enctype="multipart/form-data" id="myForm">
                                    @csrf

                                    <div class="form-group">
                                        <label for="nama">Nama Barang</label>
                                        <input type="text" name="nama" class="form-control" id="nama"  aria-describedby="nama" >
                                    </div>

                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" id="tanggal"  aria-describedby="tanggal" >
                                    </div>

                                    <div class="form-group">
                                        <label for="volume">volume</label>
                                        <input type="text" name="volume" class="form-control" id="volume" aria-describedby="volume" >
                                    </div>

                                    <div class="form-group">
                                        <label for="total">total</label>
                                        <input type="number" name="total" class="form-control" id="total"  aria-describedby="total" >
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" id="keterangan" aria-describedby="keterangan" >
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
