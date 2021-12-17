@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@push('css')
	<!-- summernote -->
	<link rel="stylesheet" href="{{ secure_asset('plugins/summernote/summernote-bs4.min.css') }}">
@endpush


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Page Contact</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item active">Edit Page Contact</li>
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
                            <h5 class="mb-0">Data Page Contact</h5>
                        </div>
						@if(Session::has('sukses'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> {{ session('sukses') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						@endif
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.contact.update') }}">
                              @csrf
                                <div class="form-row">
									<div class="form-group col-md-12">
										<label for="summernote">Deskripsi</label>
										<textarea required id="summernote" name="deskripsi">
										  {{ $contact->deskripsi }}
										</textarea>
										@error('deskripsi')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
									  </div>

									  <div class="form-group col-md-12">
										<label for="iframe">Iframe (Copy dari Google Maps)</label>
										<input type="text" class="form-control @error('iframe') is-invalid @enderror" id="iframe" name="iframe" value="{{ $contact->iframe }}">
										@error('iframe')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
									  <button type="submit" class="btn btn-info form-control"><i class="fa fa-pen mr-1"></i> Ubah Page About</button>
                                    <div class="form-group col-md-12">
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
<script src="{{ secure_asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
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