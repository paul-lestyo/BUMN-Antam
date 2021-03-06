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
					<h3>{{ $pegawai_count }}</h3>
	
					<p>Jumlah Pegawai</p>
				  </div>
				  <div class="icon">
					<i class="ion ion-android-person"></i>
				  </div>
				  <a href="{{ route('admin.pegawai.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			  </div>
			  <!-- ./col -->
			  <div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
				  <div class="inner">
					<h3>{{ $divisi_count }}</h3>
	
					<p>Jumlah Divisi</p>
				  </div>
				  <div class="icon">
					<i class="ion ion-ios-book"></i>
				  </div>
				  <a href="{{ route('admin.divisi.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			  </div>
			  <!-- ./col -->
			  <div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-warning">
				  <div class="inner">
					<h3>{{ $article_count }}</h3>
	
					<p>Jumlah Artikel</p>
				  </div>
				  <div class="icon">
					<i class="ion ion-ios-paper"></i>
				  </div>
				  <a href="{{ route('admin.article.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			  </div>
			  <!-- ./col -->
			  <div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-danger">
				  <div class="inner">
					<h3>{{ $view_count }}</h3>
	
					<p>Jumlah Pengunjung</p>
				  </div>
				  <div class="icon">
					<i class="ion ion-stats-bars"></i>
				  </div>
				  <a href="{{ route('admin.article.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			  </div>
			  <!-- ./col -->
			</div>
			<!-- /.row -->
			<div class="row">
				<!-- Left col -->
				<section class="col-lg-6 connectedSortable">
				  <!-- Custom tabs (Charts with tabs)-->
				  <div class="card">
					<div class="card-header">
					  <h3 class="card-title">
						<i class="fas fa-chart-pie mr-1"></i>
						Pengunjung Tiap Bulan
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

				<section class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
							  <i class="fas fa-chart-pie mr-1"></i>
							  Presensi Pegawai
							</h3>
						  </div>
					  <div class="card-body">
						<!-- /.d-flex -->
		
						<div class="position-relative mb-4">
						  <canvas id="sales-chart3" height="260"></canvas>
						</div>
		
						<div class="d-flex flex-row justify-content-end">
						  <span class="mr-2">
							<i class="fas fa-square text-primary"></i> This year
						  </span>
		
						  <span>
							<i class="fas fa-square text-gray"></i> Last year
						  </span>
						</div>
					  </div>
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
		labels: {!! $date !!},
		datasets: [
			{
			label: "Pengunjung",
			backgroundColor: "rgba(60,141,188,0.9)",
			borderColor: "rgba(60,141,188,0.8)",
			pointRadius: true,
			pointColor: "#3b8bba",
			pointStrokeColor: "rgba(60,141,188,1)",
			pointHighlightFill: "#fff",
			pointHighlightStroke: "rgba(60,141,188,1)",
			data: {!! $view !!},
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
		labels: {!! $date !!},
		datasets: [
			{
			data: {!! $view !!},
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

		var ticksStyle = {
		fontColor: "#495057",
		fontStyle: "bold",
		};

		var mode = "index";
		var intersect = true;
		var $visitorsChart = $("#visitors-chart");

		var $salesChart = $("#sales-chart3");
		// eslint-disable-next-line no-unused-vars
		var salesChart = new Chart($salesChart, {
		type: "bar",
		data: {
			labels: {!! json_encode(array_keys($presensi_tahun_ini->toArray())) !!},
			datasets: [
			{
				backgroundColor: "#007bff",
				borderColor: "#007bff",
				data: {!! json_encode(array_values($presensi_tahun_ini->toArray())) !!},
			},
			{
				backgroundColor: "#ced4da",
				borderColor: "#ced4da",
				data: {!! json_encode(array_values($presensi_tahun_kemarin->toArray())) !!},
			},
			],
		},
		options: {
			maintainAspectRatio: false,
			tooltips: {
			mode: mode,
			intersect: intersect,
			},
			hover: {
			mode: mode,
			intersect: intersect,
			},
			legend: {
			display: false,
			},
			scales: {
			yAxes: [
				{
				// display: false,
				gridLines: {
					display: true,
					lineWidth: "4px",
					color: "rgba(0, 0, 0, .2)",
					zeroLineColor: "transparent",
				},
				ticks: $.extend(
					{
					beginAtZero: true,
					},
					ticksStyle
				),
				},
			],
			xAxes: [
				{
				display: true,
				gridLines: {
					display: false,
				},
				ticks: ticksStyle,
				},
			],
			},
		},
		});
		// eslint-disable-next-line no-unused-vars
		var visitorsChart = new Chart($visitorsChart, {
		data: {
			labels: ["18th", "20th", "22nd", "24th", "26th", "28th", "30th"],
			datasets: [
			{
				type: "line",
				data: [100, 120, 170, 167, 180, 177, 160],
				backgroundColor: "transparent",
				borderColor: "#007bff",
				pointBorderColor: "#007bff",
				pointBackgroundColor: "#007bff",
				fill: false,
				// pointHoverBackgroundColor: '#007bff',
				// pointHoverBorderColor    : '#007bff'
			},
			{
				type: "line",
				data: [60, 80, 70, 67, 80, 77, 100],
				backgroundColor: "tansparent",
				borderColor: "#ced4da",
				pointBorderColor: "#ced4da",
				pointBackgroundColor: "#ced4da",
				fill: false,
				// pointHoverBackgroundColor: '#ced4da',
				// pointHoverBorderColor    : '#ced4da'
			},
			],
		},
		options: {
			maintainAspectRatio: false,
			tooltips: {
			mode: mode,
			intersect: intersect,
			},
			hover: {
			mode: mode,
			intersect: intersect,
			},
			legend: {
			display: false,
			},
			scales: {
			yAxes: [
				{
				// display: false,
				gridLines: {
					display: true,
					lineWidth: "4px",
					color: "rgba(0, 0, 0, .2)",
					zeroLineColor: "transparent",
				},
				ticks: $.extend(
					{
					beginAtZero: true,
					suggestedMax: 200,
					},
					ticksStyle
				),
				},
			],
			xAxes: [
				{
				display: true,
				gridLines: {
					display: false,
				},
				ticks: ticksStyle,
				},
			],
			},
		},
		});

	</script>
@endpush
  
