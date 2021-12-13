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
                    <h1 class="m-0">Edit Pengajuan</h1>
                    <a href="{{ route('admin.pengajuan-cuti.index') }}" class="btn btn-light btn-sm"><i class="fa fa-chevron-left mr-1"></i> Kembali</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item active">Edit Pengajuan</li>
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
                            <h5 class="mb-0">Edit Pengajuan Cuti</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.pengajuan-cuti.update', $pengajuan_cuti->id) }}">
                              @csrf
                                <div class="form-row">
									<div class="form-group col-md-12">
										<label>Nama Pegawai</label>
										<select name="pegawai_id" class="form-control @error('pegawai_id') is-invalid @enderror">
										@foreach ($pegawai as $pegawaiRow)
											<option value="{{ $pegawaiRow->id }}" {{ $pegawaiRow->id == $pengajuan_cuti->pegawai_id ? "selected" : "" }}>{{ $pegawaiRow->nama_pegawai }}</option>
										@endforeach
										</select>
									    @error('pegawai_id')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
									</div>
                                    <div class="form-group col-md-6">
                                        <label for="started_at">Awal Cuti</label>
                                        <input type="date" class="form-control @error('started_at') is-invalid @enderror" id="started_at" name="started_at" value="{{ $pengajuan_cuti->started_at }}">
                                        @error('started_at')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="end_at">Akhir Cuti</label>
                                        <input type="date" class="form-control @error('end_at') is-invalid @enderror" id="end_at" name="end_at" value="{{ $pengajuan_cuti->end_at }}">
                                        @error('nama_divisi')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="keterangan">Status</label>
                                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                                <option {{ ($pengajuan_cuti->status) == 'On Progress' ? 'selected' : '' }}  value="On Progress">On Progress</option>
                                                <option {{ ($pengajuan_cuti->status) == 'Accepted' ? 'selected' : '' }}  value="Accepted">Accepted</option>
                                            </select>
                                        @error('status')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" placeholder="Keterangan Cuti" value="{{ $pengajuan_cuti->keterangan }}">
                                        @error('keterangan')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="invisible">submit</label>
                                        <button type="submit" class="btn btn-primary form-control"><i class="fa fa-plus mr-1"></i> Edit Pengajuan</button>
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