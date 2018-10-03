<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Hadiah';
	$breadcrumb[1]['url'] = url('backend/daftar-hadiah');	
	$breadcrumb[2]['title'] = 'Add';
	$breadcrumb[2]['url'] = url('backend/daftar-hadiah/create');
	if (isset($data)){
		$breadcrumb[2]['title'] = 'Edit';
		$breadcrumb[2]['url'] = url('backend/daftar-hadiah/'.$data[0]->id.'/edit');
	}
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title')
	<?php
		$mode = "Create";
		if (isset($data)){
			$mode = "Edit";
		}
	?>
    Daftar Hadiah - <?=$mode;?>
@endsection

<!-- CONTENT -->
@section('content')
	<?php
		$nama = old('nama');
		$jumlah = old('jumlah');
		$active = 1;
		$method = "POST";
		$mode = "Create";
		$url = "backend/daftar-hadiah/";
		if (isset($data)){
			$nama = $data[0]->nama;
			$jumlah = $data[0]->jumlah;
			$active = $data[0]->active;
			$method = "PUT";
			$mode = "Edit";
			$url = "backend/daftar-hadiah/".$data[0]->id;
		}
	?>
	<div class="page-title">
		<div class="title_left">
			<h3>Daftar Hadiah - <?=$mode;?></h3>
		</div>
		<div class="title_right">
			<div class="col-md-4 col-sm-4 col-xs-8 form-group pull-right top_search">
                @include('backend.elements.back_button',array('url' => '/backend/daftar-hadiah'))
			</div>
        </div>
        <div class="clearfix"></div>
		@include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))
	</div>
	<div class="clearfix"></div>
	<br/><br/>	
	<div class="row">
		<div class="col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					{{ Form::open(['url' => $url, 'method' => $method,'class' => 'form-horizontal form-label-left']) }}
						{!! csrf_field() !!}
						<div class="form-group">
							<label class="control-label col-sm-3 col-xs-12">Nama <span class="required">*</span></label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" name="nama" required="required" class="form-control" value="<?=$nama;?>" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3 col-xs-12">Jumlah <span class="required">*</span></label>
							<div class="col-sm-4 col-xs-12">
								<input type="text" name="jumlah" required="required" class="form-control" value="<?=$jumlah;?>">
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-sm-6 col-xs-12 col-sm-offset-3">
								<a href="<?=url('/backend/daftar-hadiah')?>" class="btn btn-warning">Cancel</a>
								<button type="submit" class="btn btn-primary">Submit </button>
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