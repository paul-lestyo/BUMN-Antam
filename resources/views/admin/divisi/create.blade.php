@extends('layouts.app')

@section('title')
{{ $title }}
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Divisi</h1>
                    <a href="{{ route('admin.divisi.index') }}" class="btn btn-light btn-sm"><i class="fa fa-chevron-left mr-1"></i> Kembali</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item active">Tambah Divisi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Data Divisi</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.divisi.store') }}">
                              @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="nama_divisi">Nama Divisi</label>
                                        <input type="text" class="form-control @error('nama_divisi') is-invalid @enderror" id="nama_divisi" name="nama_divisi" placeholder="Masukan Nama Divisi">
                                        @error('nama_divisi')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="" class="invisible">submit</label>
                                        <button type="submit" class="btn btn-primary form-control"><i class="fa fa-plus mr-1"></i> Tambah Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
