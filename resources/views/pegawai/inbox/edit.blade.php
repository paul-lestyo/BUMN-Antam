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
                    <h1 class="m-0">Ubah Pesan</h1>
                    <a href="{{ route('pegawai.inbox.index') }}" class="btn btn-light btn-sm"><i
                            class="fa fa-chevron-left mr-1"></i> Kembali</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('pegawai.dashboard') }}">Pegawai</a></li>
                        <li class="breadcrumb-item active">Ubah Pesan</li>
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
                            <form method="POST" action="{{ route('pegawai.inbox.update',$inbox->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="subject">Subject Pesan</label>
                                    <input value="{{ old('subject',$inbox->subject) }}" type="text"
                                        class="form-control @error('subject') is-invalid @enderror" id="subject"
                                        name="subject" placeholder="Masukan Subject Pesan">
                                    @error('subject')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pesan">Isi Pesan</label>
                                    <textarea placeholder="Masukan Isi Pesan"
                                        class="form-control @error('pesan') is-invalid @enderror" id="pesan"
                                        name="pesan" rows="3">{{ old('pesan',$inbox->pesan) }}</textarea>
                                    @error('pesan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm float-right"> <i
                                            class="fa fa-save mr-1"></i> Ubah Pesan</button>
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
