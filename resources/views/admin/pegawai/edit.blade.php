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
                    <h1 class="m-0">Edit Data Pegawai</h1>
                    <a href="{{ route('admin.pegawai') }}" class="btn btn-light btn-sm"><i class="fa fa-chevron-left mr-1"></i> Kembali</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item active">Edit Data Pegawai</li>
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
                            <h5 class="mb-0">Data Pegawai</h5>
                        </div>

                        @foreach ($pegawai as $item)

                        <div class="card-body">
                            <form action="{{ route('admin.pegawai.update', $item->id) }}" method="POST">
                                @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <input type="hidden" name="id" id="id" value="{{ $item->id }}">

                                            <label for="nip">NIP</label>
                                            <input type="number" value="{{ $item->nip }}" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip">
                                            @error('nip')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                            
                                        <div class="form-group col-md-8">
                                            <label for="nama_pegawai">Nama Pegawai</label>
                                            <input type="text" value="{{ $item->nama_pegawai }}" class="form-control @error('nama_pegawai') is-invalid @enderror" id="nama_pegawai" name="nama_pegawai">
                                            @error('nama_pegawai')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-8">
                                            <label for="alamat_pegawai">Alamat Pegawai</label>
                                            <input type="text" value="{{ $item->alamat_pegawai }}" class="form-control @error('alamat_pegawai') is-invalid @enderror" id="alamat_pegawai" name="alamat_pegawai">
                                            @error('alamat_pegawai')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-8">
                                            <label for="no_telp">Nomor Telepon</label>
                                            <input type="text" value="{{ $item->no_telp }}" class="form-control @error('alamat_pegawai') is-invalid @enderror" id="no_telp" name="no_telp">
                                            @error('no_telp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-8">
                                            <label for="golongan">Golongan</label>
                                            <input type="text" value="{{ $item->golongan }}" class="form-control @error('golongan') is-invalid @enderror" id="golongan" name="golongan">
                                            @error('golongan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        

                                        <div class="form-group col-md-8">
                                            <label for="divisi">Divisi</label>
                                            <select class="form-select" aria-label="Default select example" name="divisi_id" id="divisi_id">
                                                
                                                <option value="{{ $item->divisi->id }}" selected>{{ $item->divisi->nama_divisi }}</option>
                                                @endforeach

                                                @foreach ($divisi_pegawai as $divisi)
                                                    <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                                @endforeach
                                                
                                              </select>
                                            @error('divisi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="" class="invisible">Edit</label>
                                            <button type="submit" class="btn btn-primary form-control"><i class="fa fa-save mr-1"></i> Edit Data</button>
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
