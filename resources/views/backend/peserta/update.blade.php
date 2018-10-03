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

<?php
	$cover_1 = [];
	if (isset($data)){
		$cover_1 = $data[0];
		$cover_1->field = 'photo';
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
		$alamat = old('alamat');
		$photo = old('photo', 0);
		$gender = old('gender');
		$tgl_lahir = date('d-m-Y');
        $no_undangan = old('no_undangan');
		$phone = old('phone');
		$email = old('email');		
		$active = 1;
		$method = "POST";
		$mode = "Create";
		$url = "backend/daftar-peserta";
		if (isset($data)){
			$NIK = $data[0]->NIK;
			$nama = $data[0]->nama;
			$alamat = $data[0]->alamat;
			$photo = $data[0]->photo;
			$gender = $data[0]->gender;
			$tgl_lahir = date('d-m-Y',strtotime($data[0]->tgl_lahir));
			$no_undangan = $data[0]->no_undangan;
            $phone = $data[0]->phone;
			$email = $data[0]->email;
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
							<label class="control-label col-sm-3 col-xs-12">Photo</label>
							<div class="col-sm-6 col-xs-9">
								<input type="hidden" name="photo" value=<?=$photo;?> id="id-cover-image_1">
								@include('backend.elements.change_cover',array('cover' => $cover_1, 'id_count' => 1))	
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3 col-xs-12">Email <span class="required">*</span></label>
							<div class="col-sm-3 col-xs-12">
								<input type="email" id="email" name="email" required="required" class="form-control" value="<?=$email;?>">
								<span class="error">
									<?php
										if (isset($errors)){
											echo $errors->first('email');
										}
									?>
								</span>
							</div>
						</div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12">Tanggal Lahir</label>
                            <div class="col-sm-4">
                                <div class='input-group date' id='myDatepicker'>
                                    <input type='text' class="form-control" name="tgl_lahir" value="<?=$tgl_lahir;?>">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
							<label class="control-label col-sm-3 col-xs-12">Gender</label>
							<div class="col-sm-5 col-xs-12">
								{{
								Form::select(
									'gender',
									['pria' => 'Pria', 'wanita' => 'Wanita'],
									$gender,
									array(
										'class' => 'form-control',
									))
								}}								
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3 col-xs-12">Alamat</label>
							<div class="col-sm-8 col-xs-12">
								<textarea name="alamat" class="form-control" rows=8><?=$alamat;?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3 col-xs-12">Phone</label>
							<div class="col-sm-3 col-xs-12">
								<input type="text" name="phone" class="form-control" value="<?=$phone;?>">
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