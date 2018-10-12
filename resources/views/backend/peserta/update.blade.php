<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Peserta';
	$breadcrumb[1]['url'] = url('backend/daftar-peserta');	
	$breadcrumb[2]['title'] = 'Add';
	$breadcrumb[2]['url'] = url('backend/daftar-peserta/create');
	if (isset($data)){
		$breadcrumb[2]['title'] = 'Edit';
		$breadcrumb[2]['url'] = url('backend/daftar-peserta/'.$data[0]->id.'/edit');
	}
?>

@if(Session::has('errors'))
<?php 
	$errors = Session::get('errors'); 
?>
@endif

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
    Daftar Peserta - <?=$mode;?>
@endsection

<!-- CONTENT -->
@section('content')
	<?php
		$NIK = old('NIK');
        $nama = old('nama');
		$bagian = old('alamat');
        $no_undangan = old('no_undangan');
		$active = 1;
		$method = "POST";
		$mode = "Create";
		$url = "backend/daftar-peserta";
		if (isset($data)){
			$NIK = $data[0]->NIK;
			$nama = $data[0]->nama;
			$bagian = $data[0]->bagian;
			$no_undangan = $data[0]->no_undangan;			
			$active = $data[0]->active;
			$method = "PUT";
			$mode = "Edit";
			$url = "backend/daftar-peserta/".$data[0]->id;
		}
	?>
	<div class="page-title">
		<div class="title_left">
			<h3>Daftar Peserta - <?=$mode;?></h3>
		</div>
		<div class="title_right">
			<div class="col-md-4 col-sm-4 col-xs-8 form-group pull-right top_search">
                @include('backend.elements.back_button',array('url' => '/backend/daftar-peserta'))
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
							<label class="control-label col-sm-3 col-xs-12">NIK <span class="required">*</span></label>
							<div class="col-sm-5 col-xs-12">
								<input type="text" name="NIK" class="form-control" value="<?=$NIK;?>" autofocus required>
								<span class="error">
									<?php
										if (isset($errors)){
											echo $errors->first('NIK');
										}
									?>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3 col-xs-12">No Undangan <span class="required">*</span></label>
							<div class="col-sm-5 col-xs-12">
								<input type="text" name="no_undangan" class="form-control" value="<?=$no_undangan;?>" required>
								<span class="error">
									<?php
										if (isset($errors)){
											echo $errors->first('NoUndangan');
										}
									?>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3 col-xs-12">Nama</label>
							<div class="col-sm-7 col-xs-12">
								<input type="text" name="nama" class="form-control" value="<?=$nama;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3 col-xs-12">Bagian</label>
							<div class="col-sm-3 col-xs-12">
								<input type="text" name="bagian" class="form-control" value="<?=$bagian;?>">
							</div>
                        </div>
						<div class="form-group">
							<div class="col-sm-6 col-xs-12 col-sm-offset-3">
								<a href="<?=url('/backend/daftar-peserta')?>" class="btn btn-warning">Cancel</a>
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
	<script>
        $('#myDatepicker').datetimepicker({
            format: 'DD-MM-YYYY'
        });
	</script>
	@include('backend.partials.colorbox')	
@endsection