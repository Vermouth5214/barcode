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
				<label class="control-label">NIK :</label>
				<span class="form-control"><?=$data->NIK;?></span>
			</div>
			<div class="form-group col-xs-12">
				<label class="control-label">No Undangan :</label>
				<span class="form-control"><?=$data->no_undangan;?></span>
			</div>
			<div class="form-group col-xs-12">
				<label class="control-label">Nama :</label>
				<span class="form-control"><?=$data->nama;?></span>
			</div>
			<div class="form-group col-xs-12">
				<label class="control-label">Photo :</label><br/>
				<img width=50 class="img-responsive" src="<?=url('upload/img/thumbnails/'.$data->media_image_1->name.".".$data->media_image_1->type);?>"><br/>
            </div>
			<div class="form-group col-xs-12">
				<label class="control-label">Email :</label>
				<span class="form-control"><?=$data->email;?></span>
			</div>
			<div class="form-group col-xs-12">
				<label class="control-label">Tanggal Lahir :</label>
				<span class="form-control"><?=date('d M Y', strtotime($data->tgl_lahir));?></span>
			</div>
			<div class="form-group col-xs-12">
				<label class="control-label">Gender :</label>
				<span class="form-control">
					<?php
						if ($data->gender == "pria"){
							$text = "Pria";
							$label = "success";
						} else 
						if ($data->gender == "wanita"){
							$text = "Wanita";
							$label = "success";
						}
						echo "<span class='badge badge-" . $label . "'>". $text . "</span>";
					
					?>
				</span>
			</div>
			<div class="form-group col-xs-12">
				<label class="control-label">Phone:</label>
				<span class="form-control"><?=$data->phone;?></span>
            </div>
			<div class="form-group col-xs-12">
				<label class="control-label">Alamat:</label>
				<span class="form-control"><?=$data->alamat;?></span>
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

