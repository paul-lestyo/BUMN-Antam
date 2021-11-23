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
                    <h1 class="m-0">Kelola Divisi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item active">Kelola Divisi</li>
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
                            <h5 class="mb-0">List Divisi</h5>
                            <a class="btn btn-sm btn-primary mr-0 ml-auto" href="/admin/divisi/create"><i
                                    class="fa fa-plus"></i> Tambah Divisi</a>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-light text-center">
                                    <th>No</th>
                                    <th>Nama Divisi</th>
                                    <th>Dibuat Pada</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($divisi as $item)
                                    <tr>
                                        <td class="font-weight-bold">{{ $loop->iteration }}.</td>
                                        <td>{{ $item->nama_divisi }}</td>
                                        <td>{{ $item->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.divisi.edit',$item->id) }}" class="btn btn-sm btn-info my-1" title="Edit Data">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <form action="{{ route('admin.divisi.destroy',$item->id) }}" method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger my-1" title="Hapus Data" type="submit" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?');">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
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
