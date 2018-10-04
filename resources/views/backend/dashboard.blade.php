<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Dashboard')

<!-- CONTENT -->
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Dashboard</h3>
        </div>
        <div class="title_right">
        </div>
    </div>
    <div class="clearfix"></div>
    @include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))	
    <div class="row">
        <div class="col-xs-12">
            <div class="row top_tiles">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-user"></i></div>
                        <div class="count"><?=number_format($jumlah_peserta,0,',','.');?></div>
                        <h3>Jumlah Peserta</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-user-plus"></i></div>
                        <div class="count"><?=number_format($jumlah_hadir,0,',','.');?></div>
                        <h3>Jumlah Hadir</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-user-times"></i></div>
                        <div class="count"><?=number_format($jumlah_tidak_hadir,0,',','.');?></div>
                        <h3>Jumlah Tidak Hadir</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection