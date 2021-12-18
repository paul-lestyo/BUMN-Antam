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
				<h1 class="m-0">Dashboard</h1>
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
			  <div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
				  <div class="inner">
					<h3>{{ $presensi_bulan_ini }}</h3>
	
					<p>Presensi Bulan Ini</p>
				  </div>
				  <div class="icon">
					<i class="ion ion-stats-bars"></i>
				  </div>
				  <a href="{{ route('pegawai.presensi.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			  </div>
			  <!-- ./col -->
			  <div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
				  <div class="inner">
					<h3>{{ $pengajuan_cuti }}</h3>
	
					<p>Pengajuan Cuti</p>
				  </div>
				  <div class="icon">
					<i class="ion ion-paperclip"></i>
				  </div>
				  <a href="{{ route('pegawai.pengajuan-cuti.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			  </div>
			  <!-- ./col -->
			  <div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-warning">
				  <div class="inner">
					<h3>{{ $pesan_terkirim }}</h3>
	
					<p>Pesan Terkirim</p>
				  </div>
				  <div class="icon">
					<i class="ion ion-compose"></i>
				  </div>
				  <a href="{{ route('pegawai.inbox.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			  </div>
			  <!-- ./col -->
			  <div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-danger">
				  <div class="inner">
					<h3>{{ $pesan_diterima }}</h3>
	
					<p>Pesan Diterima</p>
				  </div>
				  <div class="icon">
					<i class="ion ion-reply"></i>
				  </div>
				  <a href="{{ route('pegawai.pesanMasuk') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			  </div>
			  <!-- ./col -->
			</div>
			<!-- /.row -->
			<div class="row">
				<!-- Left col -->
				<section class="col-lg-12 connectedSortable">
				  <!-- Custom tabs (Charts with tabs)-->
				  <div class="card">
					<div class="card-header">
					  <h3 class="card-title">
						<i class="fas fa-chart-pie mr-1"></i>
						Rekap Presensi
					  </h3>
					  <div class="card-tools">
						<ul class="nav nav-pills ml-auto">
						  <li class="nav-item">
							<a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
						  </li>
						</ul>
					  </div>
					</div><!-- /.card-header -->
					<div class="card-body">
					  <div class="tab-content p-0">
						<!-- Morris chart - Sales -->
						<div class="chart tab-pane active" id="revenue-chart"
							 style="position: relative; height: 300px;">
							<canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
						 </div>
						<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
						  <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
						</div>
					  </div>
					</div><!-- /.card-body -->
				  </div>
				  <!-- /.card -->
				</section>
				<!-- /.Left col -->
		  </div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->
@endsection

@push('scripts')
	  <!-- ChartJS -->
	<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
	<script>
		var salesChartCanvas = document
		.getElementById("revenue-chart-canvas")
		.getContext("2d");
		// $('#revenue-chart').get(0).getContext('2d');

		var salesChartData = {
		labels: {!! $chart_presensi_label !!},
		datasets: [
			{
			label: "Presensi",
			backgroundColor: "rgba(60,141,188,0.9)",
			borderColor: "rgba(60,141,188,0.8)",
			pointRadius: true,
			pointColor: "#3b8bba",
			pointStrokeColor: "rgba(60,141,188,1)",
			pointHighlightFill: "#fff",
			pointHighlightStroke: "rgba(60,141,188,1)",
			data: {!! $chart_presensi_data !!},
			},
		],
		};

		var salesChartOptions = {
		maintainAspectRatio: false,
		responsive: true,
		legend: {
			display: false,
		},
		scales: {
			xAxes: [
			{
				gridLines: {
				display: false,
				},
			},
			],
			yAxes: [
			{
				gridLines: {
				display: false,
				},
			},
			],
		},
		};

		// This will get the first returned node in the jQuery collection.
		// eslint-disable-next-line no-unused-vars
		var salesChart = new Chart(salesChartCanvas, {
		// lgtm[js/unused-local-variable]
		type: "line",
		data: salesChartData,
		options: salesChartOptions,
		});

		// Donut Chart
		var pieChartCanvas = $("#sales-chart-canvas").get(0).getContext("2d");
		var pieData = {
		labels: {!! $chart_presensi_label !!},
		datasets: [
			{
			data: {!! $chart_presensi_data !!},
			backgroundColor: ["#f56954", "#00a65a", "#f39c12",'green','red','yellow','aqua','grey','orange','blue','black','purple'],
			},
		],
		};
		var pieOptions = {
		legend: {
			display: false,
		},
		maintainAspectRatio: false,
		responsive: true,
		};
		// Create pie or douhnut chart
		// You can switch between pie and douhnut using the method below.
		// eslint-disable-next-line no-unused-vars
		var pieChart = new Chart(pieChartCanvas, {
		// lgtm[js/unused-local-variable]
		type: "doughnut",
		data: pieData,
		options: pieOptions,
		});

	</script>
@endpush
  
