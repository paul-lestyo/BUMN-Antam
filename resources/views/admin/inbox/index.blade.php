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
                    <h1 class="m-0">Kontak Admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item active">Kelola Pesan</li>
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
                        <div class="card-header d-flex justify-content-between align-items-center flex-row">
                            <h5 class="mb-0">List Pesan</h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-light text-center">
                                    <th>No</th>
                                    <th>Subject Pesan</th>
                                    <th>Nama Pegawai</th>
                                    <th>Dibuat Pada</th>    
                                    <th>Aksi</th>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($pesan as $item)
                                    <tr>
                                        <td class="font-weight-bold">{{ $loop->iteration }}.</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->dataPengirim->nama_pegawai }}</td>
                                        <td>{{ $item->created_at->format('d M Y. H:i:s') }} WIB</td>
                                        <td>
                                        @if(!$item->hasReply($item->id))
                                            <a href="{{ route('admin.inbox.reply',$item->id) }}" class="btn btn-sm btn-primary my-1" title="Balas Pesan"> <i class="fas fa-reply"></i></a>
                                        @endif
                                            <a href="{{ route('admin.inbox.show',$item->id) }}" class="btn btn-sm btn-dark my-1" title="Lihat Data"> <i class="fa fa-eye"></i></a>
                                        
                                        </td>
                                    </tr>
                                    @endforeach
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
