<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Pembatalan Verifikasi Otomatis';
	$breadcrumb[1]['url'] = url('backend/verifikasi-undian-batal');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Pembatalan Verifikasi Otomatis')

<!-- CONTENT -->
@section('content')
	<div class="page-title">
		<div class="title_left" style="width : 100%">
			<h3>Pembatalan Verifikasi Otomatis</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	@include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
                    @include('backend.elements.notification')
                    <div class="row">
                        {{ Form::open(['id' => 'form-verifikasi', 'method' => 'POST','class' => 'form-horizontal form-label-left']) }}
                        {!! csrf_field() !!}
                        <div class="col-sm-1 col-xs-12" style="margin-top:7px;">
                            Hadiah :
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            {{
                            Form::select(
                                'id_hadiah',
                                $hadiah,
                                $id_hadiah,
                                array(
                                    'class' => 'form-control',
                                ))
                            }}
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <button type="submit" class="btn btn-block btn-info">Pilih</button>
                        </div>
                        {{ Form::close() }}
                    </div>
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
    <script>
        $('#form-verifikasi').submit(function(){
            if (confirm("Apakah anda yakin mau membatalkan data ini?")) {
                return true;     
    		}
	    	return false;
        });
    </script>
@endsection