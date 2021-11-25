@extends('layouts.master-dashboard')

@section('title', 'Sistem Absensi Kegiatan')


@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tambah Kegiatan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6 small-9">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
            <li class="breadcrumb-item active">Tambah kegiatan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->

      <div class="row my-3">
        <div class="col-lg col-md-12">
          <div class="card card-primary small-9">
            <div class="card-header">
              <h5 class="card-title">Form Tambah Kegiatan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kegiatan.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama kegiatan</label>
                        <input type="text" name="nama_kegiatan" id="" class="form-control" placeholder="Nama kegiatan" value="{{ old('nama_kegiatan') }}">
                        @error('nama_kegiatan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="text" name="tanggal" id="" class="form-control datepicker" placeholder="Tanggal kegiatan" value="{{ old('tanggal') }}">
                        @error('tanggal')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Universitas</label>
                        <select name="id_univ" id="" class="form-control">
                            <option value="">-- Pilih Universitas --</option>
                            @foreach ($univ as $val)
                              <option value="{{$val->id}}" {{ old('id_univ')==$val->id ? 'selected' : null }}>{{ $val->nama_univ }}</option>
                            @endforeach
                        </select>
                        @error('id_univ')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary float-right px-3">Simpan</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.container-fluid -->
</div>
@endsection

@section('styles')
  <link rel="stylesheet" href="{{ asset('bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
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
  <script type="text/javascript" src="{{ asset('bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });

      $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            yearRange: '1999:2012',
            minDate: new Date(1999, 10 - 1, 25),
            maxDate: '+30Y',
        });
    });
  </script>
@endsection