<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Daftar Undian';
	$breadcrumb[1]['url'] = url('backend/daftar-undian');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Daftar Undian')

<!-- CONTENT -->
@section('content')
	<div class="page-title">
		<div class="title_left" style="width : 100%">
			<h3>Daftar Undian</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	@include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
                    <div class="row">
                        {{ Form::open(['method' => 'GET','class' => 'form-horizontal form-label-left']) }}
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
                    <?php
                        if ($id_hadiah !=0):
                    ?>
                        <br/>
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 text-center">
                                <h4><b>Jumlah Hadiah</b></h4>
                                <h3><span id="jumlah_hadiah"><?=number_format($jumlah_hadiah,0,',','.');?></span></h3>
                            </div>
                            <div class="col-xs-12 col-sm-3 text-center">
                                <h4><b>Jumlah Undian</b></h4>
                                <h3><span id="jumlah_undian"><?=number_format($jumlah_undian,0,',','.');?></span></h3>
                            </div>
                            <div class="col-xs-12 col-sm-3 text-center">
                                <h4><b>Jumlah Diterima</b></h4>
                                <h3><span id="jumlah_ditrima"><?=number_format($jumlah_ditrima,0,',','.');?></span></h3>
                            </div>
                            <div class="col-xs-12 col-sm-3 text-center">
                                <h4><b>Jumlah Ditolak</b></h4>
                                <h3><span id="jumlah_ditolak"><?=number_format($jumlah_ditolak,0,',','.');?></span></h3>
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
                        <div class="row">
                            {{ Form::open(['method' => 'POST','class' => 'form-horizontal form-label-left']) }}
                            {!! csrf_field() !!}
                            <input type="hidden" value="<?=$id_hadiah;?>" name="id_hadiah" id="id_hadiah">
                            <div class="col-xs-12 col-sm-1" style="margin-top:7px;">
                                NIK <span class="required">*</span>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <input type="text" name="NIK" class="form-control" autofocus required>
                            </div>
                            <div class="col-xs-12 col-sm-2">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                        @if (Session::has('data'))
                            <hr/>
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php
                                        $data = Session::get('data');
                                    ?>
                                    <h4>Data Peserta</h4>
                                    NIK : <b><?=$data[0]->NIK;?></b><br/>
                                    No Undangan : <b><?=$data[0]->no_undangan;?></b><br/>
                                    Nama : <b><?=$data[0]->nama;?></b><br/>
                                    Alamat : <b><?=$data[0]->alamat;?></b><br/>
                                    Phone : <b><?=$data[0]->phone;?></b><br/>
                                </div>
                            </div>
                        @endif
                    <?php
                        endif;
                    ?>
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
    <?php
        if ($id_hadiah !=0):
    ?>
    <script>
        setInterval(function() {
            $.ajax({
                url: "{{ url('/backend/undian/stat') }}",
                method: 'post',
                dataType:"json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id_hadiah": $('#id_hadiah').val()
                },
                success: function(result){
                    $("#jumlah_hadiah").html(result.jumlah_hadiah);
                    $("#jumlah_undian").html(result.jumlah_undian);
                    $("#jumlah_ditrima").html(result.jumlah_ditrima);
                    $("#jumlah_ditolak").html(result.jumlah_ditolak);
                }
            });            
        }, 10000); //10 seconds
    </script>
    <?php
        endif;
    ?>
@endsection