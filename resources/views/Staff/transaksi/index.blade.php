@extends('staff.layouts.app')

@section('content')

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
          <div class="row align-items-center">
              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                  <h4 class="page-title">Transaksi</h4>
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
                            <a href="/staff/laporan" class="float-end btn btn-success">Cetak Laporan</a>
                            <h3 class="box-title">Data Transaksi</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">ID Barang</th>
                                            <th class="border-top-0">Tanggal</th>
                                            <th class="border-top-0">Total</th>
                                            <th class="border-top-0">Keterangan</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->stock_id }}</td>
                                            <td>{{ $item->date_order }}</td>
                                            <td>{{ $item->total }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>
                                                <a href="/staff/transaksi/{{ $item->id }}/edit" class="btn btn-primary">Terbayar ?</a>
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
