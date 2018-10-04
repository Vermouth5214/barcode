<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Undian extends Model
{
	protected $table = 'undian';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	protected $hidden = ['created_at', 'updated_at'];
	
	public function user_modify()
	{
		return $this->belongsTo('App\Model\User', 'user_modified');
	}

	public function peserta()
	{
		return $this->belongsTo('App\Model\Peserta', 'id_peserta');
	}

	public function hadiah()
	{
		return $this->belongsTo('App\Model\Hadiah', 'id_hadiah');
	}

}