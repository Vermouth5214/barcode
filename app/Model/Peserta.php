<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
	protected $table = 'peserta';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	protected $hidden = ['created_at', 'updated_at'];
	
	public function media_image_1()
	{
		return $this->belongsTo('App\Model\MediaLibrary', 'photo');
	}
	
	public function user_modify()
	{
		return $this->belongsTo('App\Model\User', 'user_modified');
	}
}