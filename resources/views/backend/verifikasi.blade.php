<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Verifikasi';
	$breadcrumb[1]['url'] = url('backend/verifikasi-undian');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Verifikasi Undian')

<!-- CONTENT -->
@section('content')
	<div class="page-title">
		<div class="title_left" style="width : 100%">
			<h3>Verifikasi Undian</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	@include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
                    {{ Form::open(['method' => 'GET','class' => 'form-horizontal']) }}
                        @if (Session::has('success'))
                            <div class="row">
                                <div class="col-xs-12 col-md-12 alert alert-<?=Session::get('mode');?> alert-dismissible" role="alert">
                                    {{ Session::get('success') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
                    <?php
                        if (isset($_GET['NIK'])):
                    ?>
                        {{ Form::open(['id' => 'form-undian' ,'method' => 'POST','class' => 'form-horizontal']) }}
                        <input type="hidden" name="id_undian" value=<?=$undian[0]->id;?>>
                        <hr/>
                        <h3>Hadiah : <b><i><?=$undian[0]->hadiah->nama;?></i></b></h3>
                        <br/>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <h4>Data Peserta</h4><br/>
                                NIK : <b><?=$undian[0]->peserta->NIK;?></b><br/>
                                No Undangan : <b><?=$undian[0]->peserta->no_undangan;?></b><br/>
                                Nama : <b><?=$undian[0]->peserta->nama;?></b><br/>
                                Bagian : <b><?=$undian[0]->peserta->bagian;?></b><br/>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <h4>Status</h4><br/>
                                <div class="radio">
                                    <label><input type="radio" name="status" value=1 checked>Diterima</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="status" value=2>Ditolak</label>
                                </div>
                                <div id="keterangan" class="hide">
                                    Alasan Penolakan
                                    <textarea class="form-control" name="keterangan" id="text-keterangan"></textarea>
                                </div>
                                <br/>
                                <button type="submit" class="btn btn-block btn-info">Submit</button>
                            </div>
                        </div>
                        {{ Form::close() }}
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
    <script>
        $('input[type=radio][name=status]').change(function() {
            if (this.value == 1) {
                $('#keterangan').addClass('hide');
                $("#text-keterangan").prop('required',false);
            }
            else if (this.value == 2) {
                $('#keterangan').removeClass('hide');
                $("#text-keterangan").prop('required',true);
            }
        });
        
        $('#form-undian').submit(function(){
            if (confirm("Apakah anda yakin mau menginput data ini?")) {
                return true;     
    		}
	    	return false;
        });
    </script>
@endsection