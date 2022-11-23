@extends('admin.layouts.app')

@section('content')

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
          <div class="row align-items-center">
              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                  <h4 class="page-title">Stock</h4>
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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <a href="/admin/stock/create" class="float-end btn btn-success text-light">Tambah Data</a>
                            <h3 class="box-title">Stock</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0" width="50px">ID</th>
                                            <th class="border-top-0" width="100px">Nama Barang</th>
                                            <th class="border-top-0" width="100px">Harga Beli</th>
                                            <th class="border-top-0" width="100px">Harga Jual</th>
                                            <th class="border-top-0" width="100px">Volume</th>
                                            <th class="border-top-0" width="100px">Unit ID</th>
                                            <th class="border-top-0" width="200px">Foto</th>
                                            <th class="border-top-0" width="100px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stocks as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->nama_barang }}</td>
                                            <td>{{ $item->hargabeli}}</td>
                                            <td>{{ $item->hargajual}}</td>
                                            <td>{{ $item->volume }}</td>
                                            <td>{{ $item->unit_id }}</td>
                                            <td>
                                                <img src="{{ asset('storage/'.$item->photo) }}" class="w-50" alt="">
                                            </td>
                                            <td>
                                                <form action="/admin/stock/{{ $item->id }}" method="post">

                                                    <a href="/admin/stock/{{ $item->id }}/edit" class="btn btn-primary text-light">Edit</a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger text-light">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            @endsection
