@extends('layouts.master-dashboard')

@section('title', 'Sistem Absensi Kegiatan')


@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6 small-9">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Dashboard Absensi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->

      <div class="row my-3">
        <div class="col-lg col-md-12">
          <div class="card small-9">
            <div class="card-header">
              <h5 class="card-title">Data Absensi</h5>
            </div>
            <div class="card-body">
              <div class="row my-3">
                <div class="col-md-12">
                  <a class="btn btn-success text-white">Eksport PDF</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg col-md-12">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Kegiatan</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Hanif</td>
                        <td>Pramuka</td>
                        <td>Menunggu konfirmasi</td>
                        <td><img src="#"></td>
                        <td>
                          <a href="#" class="btn btn-sm btn-success">Konfirmasi</a>
                        </td>
                      </tr>
                      <tr>
                        <td>JO</td>
                        <td>Osis</td>
                        <td>Terkonfirmasi</td>
                        <td><img src="#"></td>
                        <td>
                          <a href="#" class="btn btn-sm btn-success">Konfirmasi</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.container-fluid -->
</div>
@endsection

@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('scripts')
  <!-- DataTables -->
  <script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>
@endsection