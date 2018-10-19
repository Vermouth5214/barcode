<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Kehadiran';
	$breadcrumb[1]['url'] = url('backend/input-hadir');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Input Kehadiran')

<!-- CONTENT -->
@section('content')
	<div class="page-title">
		<div class="title_left" style="width : 100%">
			<h3>Input Kehadiran</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	@include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
                    {{ Form::open(['method' => 'POST','class' => 'form-horizontal']) }}
                        <div class="row">
                            <div class="col-xs-12">
                                <h3>Daftar Hadir : <span class="text-danger"><?=number_format($jumlah_hadir, 0, ',','.');?> </span> / <span class="text-info"><?=number_format($jumlah_peserta,0,',','.');?></span></h3>
                            </div>
                        </div>
                        <br/>
                        @if (Session::has('success'))
                            <div class="row">
                                <div class="col-xs-12 col-md-12 alert alert-<?=Session::get('mode');?> alert-dismissible" role="alert">
                                    {{ Session::get('success') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                </div>
                            </div>
                        @endif
                        @if (Session::has('data'))
                            <hr/>
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php
                                        $data = Session::get('data');
                                    ?>
                                    <h4>NIK : <b><?=$data[0]->NIK;?></b></h4>
                                    <h4>Nama : <b><?=$data[0]->nama;?></b></h4>
                                    <h4>Bagian : <b><?=$data[0]->bagian;?></b></h4>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-xs-12 col-sm-1" style="margin-top:7px;">
                                NIK <span class="required">*</span>
                            </div>
                            <div class="col-xs-12 col-sm-5">
                                <input type="text" name="NIK" class="form-control" autofocus required>
                            </div>
                            <div class="col-xs-12 col-sm-2">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                    {{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection

<!-- CSS -->
@section('css')

@endsection

<!-- JAVASCRIPT -->
@section('script')

@endsection