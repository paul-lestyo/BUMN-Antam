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
                    <h1 class="m-0">Cek Gaji</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('pegawai.dashboard') }}">Pegawai</a></li>
                        <li class="breadcrumb-item active">Cek Gaji</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(Session::has('sukses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session('sukses') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-light text-center">
                                    <th>Nama</th>
                                    <th>Golongan</th>
                                    <th>Jumlah Presensi</th>
                                    <th>Total Gaji</th>
                                </th>
                                <tbody class="text-center">
                                    {{-- @foreach ($pengajuan_cuti as $item)
                                    <tr>
                                        <td class="font-weight-bold">{{ $loop->iteration }}.</td>
                                        <td>{{ $item->started_at}}</td>
                                        <td>{{ $item->end_at}}</td>
										<td>{{ $item->status}}</td>
                                        <td>{{ $item->keterangan}}</td>
                                    </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
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
