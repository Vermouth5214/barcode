<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Laporan Undian';
	$breadcrumb[1]['url'] = url('backend/laporan-undian');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Laporan Undian')

<!-- CONTENT -->
@section('content')
	<div class="page-title">
		<div class="title_left" style="width : 100%">
			<h3>Laporan Undian</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	@include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form id="form-work" class="form-horizontal" role="form" autocomplete="off" method="GET">
						{!! csrf_field() !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-1" style="margin-top:7px;">
                                Hadiah
                            </div>
                            <div class="col-xs-12 col-sm-5">
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
						</div>
						<br/>
                        <div class="row">
                            <div class="col-xs-12 col-sm-1" style="margin-top:7px;">
                                Status 
                            </div>
                            <div class="col-xs-12 col-sm-5">
                                <select name="status" class="form-control">
                                    <?php
                                        $selected = "";
                                        if ($status == "3"){
                                            $selected = "selected";
                                        }
                                    ?>
									<option value="3" <?=$selected;?>>Semua</option>
                                    <?php
                                        $selected = "";
                                        if ($status == "0"){
                                            $selected = "selected";
                                        }
                                    ?>
                                    <option value="0" <?=$selected;?>>Belum Verifikasi</option>
                                    <?php
                                        $selected = "";
                                        if ($status == "1"){
                                            $selected = "selected";
                                        }
                                    ?>
                                    <option value="1" <?=$selected;?>>Diterima</option>
                                    <?php
                                        $selected = "";
                                        if ($status == "2"){
                                            $selected = "selected";
                                        }
                                    ?>
                                    <option value="2" <?=$selected;?>>Ditolak</option>
                                </select>
							</div>
						</div>
						<br/>
						<div class="row">
                            <div class="col-xs-12 col-sm-2 col-sm-offset-4">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>	


	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<table class="table table-striped table-hover table-bordered dt-responsive nowrap dataTable" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>NIK</th>
								<th>No Undangan</th>								
								<th>Nama</th>
								<th>Phone</th>
                                <th>Hadiah</th>
								<th>Status</th>
								<th>Keterangan</th>
							</tr>
						</thead>
					</table>
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
		$('.dataTable').dataTable({
			processing: true,
			serverSide: true,
            "order": [[ 0, "desc" ]],
			ajax: "<?=url('backend/laporan-undian/datatable?id_hadiah='.$id_hadiah.'&status='.$status);?>",
			columns: [
				{data: 'id', name: 'undian.id'},
				{data: 'NIK', name: 'peserta.NIK'},
				{data: 'no_undangan', name: 'peserta.no_undangan'},
				{data: 'NamaPeserta', name: 'peserta.nama'},
				{data: 'phone', name: 'peserta.phone'},
				{data: 'nama', name: 'hadiah.nama'},
				{data:  'status', render: function ( data, type, row ) {
					var text = "";
					if (data == 0){
						text = "Belum Verifikasi";
					} else
					if (data == 1){
						text = "Diterima";
					} else
					if (data == 2){
						text = "Ditolak";
					}
					return text;
                }},
				{data: 'keterangan', name: 'keterangan'}
			],
			responsive: true
		});
	</script>
@endsection