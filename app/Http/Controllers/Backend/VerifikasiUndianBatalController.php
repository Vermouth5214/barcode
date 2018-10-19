<?php
namespace App\Http\Controllers\Backend;

use Session;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Model\Undian;
use App\Model\Peserta;
use App\Model\Hadiah;
use Illuminate\Support\Facades\Redirect;
use View;

class VerifikasiUndianBatalController extends Controller {
	public function index(Request $request) {
		$hadiah = Hadiah::where('active','=',1)->orderBy('id','desc')->pluck('nama','id');
		$id_hadiah = 0;
		return view ('backend.verifikasi_batal',['hadiah' => $hadiah, 'id_hadiah' => $id_hadiah]);
	}
	
	public function store (Request $request){
		$update = Undian::where('id_hadiah','=',$request->id_hadiah)->where('status','=',0)->update(['status' => 2, 'keterangan' => 'melebihi batas waktu','user_modified' => Session::get('userinfo')['user_id']]);
		return Redirect::to('/backend/verifikasi-undian-batal/')->with('success', "Data saved successfully")->with('mode', 'success');
	}
	
}