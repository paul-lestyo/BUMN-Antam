@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@push('css')
	<!-- summernote -->
	<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Artikel</h1>
                    <a href="{{ route('admin.article.index') }}" class="btn btn-light btn-sm"><i class="fa fa-chevron-left mr-1"></i> Kembali</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item active">Tambah Data Artikel</li>
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
                            <h5 class="mb-0">Data Article</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <label for="judul">Judul</label>
                                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul">
                                            @error('judul')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

										<div class="form-group col-md-12">
											<label for="summernote">Deskripsi</label>
											<textarea required id="summernote" name="deskripsi">
											</textarea>
											@error('deskripsi')
											  <div class="invalid-feedback">
												{{ $message }}
											  </div>
											@enderror
										  </div>

                                        <div class="form-group col-md-12">
                                            <label for="author">Author</label>
                                            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author">
                                            @error('author')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

										<div class="form-group col-md-12">
                                            <label for="category">Category</label>
                                            <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                                            @error('category')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="img">Gambar</label><br>
                                            <input type="file" class="@error('file') is-invalid @enderror" id="file" name="img">
                                            @error('file')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        

                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-primary form-control"><i class="fa fa-save mr-1"></i> Tambah Data</button>
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


@push('scripts')
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
	$(function () {
    // Summernote
    $('#summernote').summernote({
		height: 300,
		focus: true,
		toolbar: [
			['style', ['style']],
			['font', ['bold', 'underline', 'clear']],
			['fontname', ['fontname']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['table', ['table']],
			['insert', ['link']],
			['view', ['fullscreen', 'help']],
		],
	})
  })
</script>
@endpush