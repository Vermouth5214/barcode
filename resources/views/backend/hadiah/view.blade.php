<?php
	if (!empty($data)):
		$data = $data[0];
?>
	<div class="x_panel">
		<div class="x_content">
			<div class="form-group col-xs-12">
				<label class="control-label">ID :</label>
				<span class="form-control"><?=$data->id;?></span>
			</div>
			<div class="form-group col-xs-12">
				<label class="control-label">Nama :</label>
				<span class="form-control"><?=$data->nama;?></span>
			</div>
			<div class="form-group col-xs-12">
				<label class="control-label">Jumlah :</label>
				<span class="form-control"><?=$data->jumlah;?></span>
            </div>
			<div class="form-group col-xs-12">
				<label class="control-label">Urutan :</label>
				<span class="form-control"><?=$data->urutan;?></span>
			</div>
			<div class="form-group col-xs-12">
				<label class="control-label">Date Created :</label>
				<span class="form-control"><?=date('d M Y H:i:s', strtotime($data->created_at));?></span>
			</div>
			<div class="form-group col-xs-12">
				<label class="control-label">Last Modified :</label>
				<span class="form-control"><?=date('d M Y H:i:s', strtotime($data->updated_at));?></span>
			</div>
			<div class="form-group col-xs-12">
				<label class="control-label">Last Modified by :</label>
				<span class="form-control"><?=$data->user_modify->username;?></span>
			</div>
		</div>
	</div>
<?php
	endif;
?>

