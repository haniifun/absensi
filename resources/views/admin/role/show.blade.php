@extends('layouts.master-dashboard')

@section('title', 'Sistem Absensi Kegiatan')


@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Role & Permission</h1>
        </div><!-- /.col -->
        <div class="col-sm-6 small-9">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Detail role</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->

      <div class="row my-3">
        <div class="col-lg col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Role</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg col-md-12">
                  <table class="table table-hover table-bordered">
                    <tr>
                        <th>Role</th>
                        <td>{{ $role->name }}</td>
                    </tr>
                    <tr>
                        <th>Hak akses</th>
                        <td>
                            <ul class="m-0">
                                @foreach ($role->permissions as $permission)    
                                    <li>{{ $permission->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                  </table>
                </div>
            </div>
            <a href="{{ route('admin.role.index') }}" class="btn btn-primary float-right" onclick="goBack()"><i class="fas fa-arrow-circle-left"> </i> Kembali</a>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.container-fluid -->
</div>
@endsection