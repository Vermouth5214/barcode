<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Model\Undian;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use View;
 
class DisplayController extends Controller {
	public function index() {
        $jenis_hadiah = "";
        $data_undian = [];
        $last_data = Undian::with('hadiah')->orderBy('id','DESC')->first();
        if (!empty($last_data)){
            $jenis_hadiah = $last_data->hadiah->nama;
            $data = $last_data->hadiah->nama;
            $data_undian = Undian::with('peserta')->where('id_hadiah','=',$last_data->id_hadiah)->orderBy('id','ASC')->get();
        }
        view()->share('jenis_hadiah', $jenis_hadiah);
        view()->share('data_undian', $data_undian);
		return view ('display');
    }
    
    public function auto(){
        $jenis_hadiah = "";
        $data_undian = [];
        $last_data = Undian::with('hadiah')->orderBy('id','DESC')->first();
        if (!empty($last_data)){
            $jenis_hadiah = $last_data->hadiah->nama;
            $data = $last_data->hadiah->nama;
            $data_undian = Undian::with('peserta')->where('id_hadiah','=',$last_data->id_hadiah)->orderBy('id','ASC')->get();
        }
        $result = array();
        $result['jenis_hadiah'] = $jenis_hadiah;
        $result['data_undian'] = "";
        $i = 1;
        foreach ($data_undian as $item) :
            $result['data_undian'].="<div class='row'><div class='col-xs-1'>".$i."</div><div class='col-xs-11'>".$item->peserta->nama." - ".$item->peserta->bagian."</div></div>";
            $i++;
        endforeach;
        return json_encode($result);
    }
}