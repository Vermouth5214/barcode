<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Laporan Kehadiran';
	$breadcrumb[1]['url'] = url('backend/laporan-kehadiran');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Laporan Kehadiran')

<!-- CONTENT -->
@section('content')
	<div class="page-title">
		<div class="title_left" style="width : 100%">
			<h3>Laporan Kehadiran</h3>
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
                            <div class="col-xs-12 col-sm-2" style="margin-top:7px;">
                                Peserta Undian
                            </div>
                            <div class="col-xs-12 col-sm-5">
                                <select name="undian" class="form-control">
                                    <?php
                                        $selected = "";
                                        if ($undian == "2"){
                                            $selected = "selected";
                                        }
                                    ?>
                                    <option value="2" <?=$selected;?>>Semua</option>
                                    <?php
                                        $selected = "";
                                        if ($undian == "1"){
                                            $selected = "selected";
                                        }
                                    ?>
                                    <option value="1" <?=$selected;?>>Ya</option>
                                    <?php
                                        $selected = "";
                                        if ($undian == "0"){
                                            $selected = "selected";
                                        }
                                    ?>
                                    <option value="0" <?=$selected;?>>Tidak</option>
                                </select>
							</div>
						</div>
						<br/>
                        <div class="row">
                            <div class="col-xs-12 col-sm-2" style="margin-top:7px;">
                                Status 
                            </div>
                            <div class="col-xs-12 col-sm-5">
                                <select name="status" class="form-control">
                                    <?php
                                        $selected = "";
                                        if ($status == "2"){
                                            $selected = "selected";
                                        }
                                    ?>
									<option value="2" <?=$selected;?>>Semua</option>
                                    <?php
                                        $selected = "";
                                        if ($status == "1"){
                                            $selected = "selected";
                                        }
                                    ?>
                                    <option value="1" <?=$selected;?>>Hadir</option>
                                    <?php
                                        $selected = "";
                                        if ($status == "0"){
                                            $selected = "selected";
                                        }
                                    ?>
                                    <option value="0" <?=$selected;?>>Tidak Hadir</option>
                                </select>
							</div>
						</div>
						<br/>
						<div class="row">
                            <div class="col-xs-12 col-sm-2 col-sm-offset-5">
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
								<th>Nama</th>
                                <th>Bagian</th>
                                <th>Undangan</th>
                                <th>Undian</th>
								<th>Hadir</th>
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
			ajax: "<?=url('backend/laporan-kehadiran/datatable?undian='.$undian.'&status='.$status);?>",
			columns: [
				{data: 'id', name: 'id'},
				{data: 'NIK', name: 'NIK'},
				{data: 'nama', name: 'nama'},
				{data: 'bagian', name: 'bagian'},
                {data: 'undangan', name: 'undangan'},
				{data:  'undian', render: function ( data, type, row ) {
					var text = "";
					if (data == 0){
						text = "";
					} else
					if (data == 1){
						text = "V";
					} 
					return text;
                }},
				{data:  'hadir', render: function ( data, type, row ) {
					var text = "";
					if (data == 0){
						text = "";
					} else
					if (data == 1){
						text = "V";
					} 
					return text;
                }}
			],
			responsive: true
		});
	</script>
@endsection