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
                    <h1 class="m-0">Lihat Pesan</h1>
                    <a href="{{ route('pegawai.inbox.index') }}" class="btn btn-light btn-sm"><i
                            class="fa fa-chevron-left mr-1"></i> Kembali</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('pegawai.dashboard') }}">Pegawai</a></li>
                        <li class="breadcrumb-item active">Lihat Pesan</li>
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
                            <h5 class="mb-0">Data Pesan</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between border-bottom mb-2">
                                <div>
                                    <h6 class="font-weight-bold mb-0">Dibuat Pada :</h6>
                                    <p class="mb-2">{{ $inbox->created_at->format("d M Y, H:i") }} WIB</p>
                                </div>
                                <div>
                                    <h6 class="font-weight-bold mb-0">Terakhir Diubah Pada :</h6>
                                    <p class="mb-2">{{ $inbox->updated_at->format("d M Y, H:i") }} WIB</p>
                                </div>
                            </div>
                            <div>
                                <h6 class="font-weight-bold mb-1">Subject Pesan :</h6>
                                <p>{{ $inbox->subject }}</p>
                            </div>
                            <div>
                                <h6 class="font-weight-bold mb-1">Isi Pesan :</h6>
                                <p style="white-space: pre-wrap;">{{ $inbox->pesan }}</p>
                            </div>
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