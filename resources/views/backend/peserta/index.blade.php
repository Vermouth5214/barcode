<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Peserta';
	$breadcrumb[1]['url'] = url('backend/daftar-peserta');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Daftar Peserta')

<!-- CONTENT -->
@section('content')
	<div class="page-title">
		<div class="title_left">
			<h3>Daftar Peserta</h3>
		</div>
		<div class="title_right">
			<div class="col-md-4 col-sm-4 col-xs-6 form-group pull-right top_search">
				@include('backend.elements.create_button',array('url' => '/backend/daftar-peserta/create'))
            </div>
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
                            <div class="col-xs-12 col-sm-2">
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
					@include('backend.elements.notification')
					<table class="table table-striped table-hover table-bordered dt-responsive nowrap dataTable" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>NIK</th>
								<th>No Undangan</th>								
								<th>Nama</th>
                                <th>Phone</th>
								<th>Hadir</th>
								<th>Actions</th>
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
			ajax: "<?=url('backend/daftar-peserta/datatable?status='.$status);?>",
			columns: [
				{data: 'id', name: 'id'},
				{data: 'NIK', name: 'NIK'},
				{data: 'no_undangan', name: 'no_undangan'},				
				{data: 'nama', name: 'nama'},
				{data: 'phone', name: 'phone'},
				{data:  'hadir', render: function ( data, type, row ) {
					var text = "";
					var label = "";
					if (data == 1){
						text = "V";
					}
					return text;
                }},				
				{data: 'action', name: 'action', orderable: false, searchable: false}
			],
			responsive: true
		});
	</script>
@endsection