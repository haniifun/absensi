@extends('layouts.master-dashboard')

@section('title', 'Sistem Absensi Kegiatan')


@section('content')
@php 
use Carbon\Carbon;
@endphp
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6 small-9">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
            <li class="breadcrumb-item active">index</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->

      {{-- Alert --}}
      @if (\Session::has('message'))
          {!! \Session::get('message') !!}
      @endif
      
      <div class="row my-3">
        <div class="col-lg col-md-12">
          <div class="card small-9">
            <div class="card-header">
              <h5 class="card-title">Data Kegiatan</h5>
            </div>
            <div class="card-body">
              <div class="row my-3">
                <div class="col-md-12">
                  <a href="{{ route('kegiatan.create') }}" class="btn btn-primary text-white"><i class="fas fa-plus"></i> Tambah</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg col-md-12">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Universitas</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($kegiatan as $val)
                        <tr>
                            <td class="col-2 text-center">
                                <a href="{{ route('kegiatan.delete', $val->id) }}" data-method='delete' data-confirm='Apakah anda yakin ingin menghapus kegiatan {{$val->nama_kegiatan}}?' class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                <a href="{{ route('kegiatan.edit', $val->id) }}" class="btn btn-sm btn-default"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('kegiatan.show', $val->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            </td>
                            <td>{{ $val->nama_kegiatan}}</td>
                            <td>{{ Carbon::parse($val->tanggal)->translatedFormat('l, d F Y'); }}</td>
                            <td>{{ $val->univ->nama_univ}}</td>
                        </tr>
                      @endforeach
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
  <script src="{{ asset('js/ujs.min.js') }}"></script>
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