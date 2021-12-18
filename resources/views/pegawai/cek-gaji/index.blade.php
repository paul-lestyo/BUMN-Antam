@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cek Gaji</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('pegawai.dashboard') }}">Pegawai</a></li>
              <li class="breadcrumb-item active">Cek Gaji</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              Slip gaji ini bisa diambil diawal bulan ke divisi Bendahara.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> PT ANTAM TBK, Inc.
                    <small class="float-right">Date: {{date('d/m/Y')}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Gaji Pokok</th>
                      <th>Persentase Kehadiran</th>
                      <th>Gaji Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ "Rp " .number_format($gaji,2,',','.') }}</td>
                        <td>{{ number_format($persentase*100, 2, '.', '') }} %</td>
                        <td>{{ "Rp " .number_format($sub_gaji,2,',','.') }}</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due {{date('d/m/Y')}}</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{ "Rp " .number_format($sub_gaji,2,',','.') }}</td>
                      </tr>
                      <tr>
                        <th>Pajak (10%)</th>
                        <td>{{ "Rp " .number_format($pajak,2,',','.') }}</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>{{ "Rp " .number_format($total_gaji,2,',','.') }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                </div>
              </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
