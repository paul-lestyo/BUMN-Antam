@extends('layouts.app')

@section('title')
Dashboard - Admin BUMN Antam
@endsection

@push('css')
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0">Presensi</h1>
			  </div><!-- /.col -->
			  <div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="#">Home</a></li>
				  <li class="breadcrumb-item active">Dashboard v1</li>
				</ol>
			  </div><!-- /.col -->
			</div><!-- /.row -->
		  </div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->
	
		<!-- Main content -->
		<section class="content">
		  <div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
			  <div class="col-lg-6 col-6">
				<!-- small box -->
				<div class="small-box {{ $presensi ? 'bg-info' : 'bg-danger' }}">
				  <div class="inner">
					<h3>Presensi Masuk Pegawai</h3>
	
					@if(!$presensi)
						<p>Presensi Masuk Disini !</p>
					@else
						<p>Terima kasih sudah presensi!</p>
					@endif
				  </div>
				  <div class="icon">
					<i class="ion ion-bag"></i>
				  </div>
				  @if (!$presensi)
					<a href="{{ route('pegawai.presensi.prosesAbsen') }}" class="small-box-footer">Anda belum presensi <i class="fas fa-arrow-circle-right"></i></a>
				  @else
				  	<a href="#" class="small-box-footer">Anda sudah Presensi</a>
				  @endif
				</div>
			  </div>
			  <!-- ./col -->

			  <!-- ./col -->
			  <div class="col-lg-6 col-6">
				<!-- small box -->
				<div class="small-box {{ $presensi && $presensi->jurnal ? 'bg-info' : 'bg-danger' }}">
				  <div class="inner">
					<h3>Presensi Pulang Pegawai</h3>
	
					@if ($presensi && $presensi->jurnal)
						<p>Terima kasih sudah mengisi Jurnal Harian !</p>
					@else
						<p>Presensi Pulang Disini dan Isi Jurnal Harian !</p>	
					@endif
				  </div>
				  <div class="icon">
					<i class="ion ion-pie-graph"></i>
				  </div>
                  @if ($presensi && $presensi->jurnal)
                    <a href="#" class="small-box-footer">Anda sudah Presensi Pulang</a>
                  @else
					<a href="{{ route('pegawai.presensi.isiJurnal') }}" class="small-box-footer">Anda belum presensi pulang <i class="fas fa-arrow-circle-right"></i></a>
                  @endif
				</div>
			  </div>
			  <!-- ./col -->
			</div>
			<!-- /.row -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="thead-light text-center">
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Jurnal</th>
                                        </th>
                                        <tbody class="text-center">
                                            @foreach ($pegawai as $item)
                                            <tr>
                                                <td class="font-weight-bold">{{ $loop->iteration }}.</td>
                                                <td>{{ $item->created_at->format('d F Y') }}</td>
                                                <td>Hadir</td>
                                                <td>{{ $item->jurnal}}</td>
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
		  </div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->
@endsection