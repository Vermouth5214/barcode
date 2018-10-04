<?php
namespace App\Http\Controllers\Backend;

use Session;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Model\Peserta;
use Illuminate\Support\Facades\Redirect;
use View;

class KehadiranController extends Controller {
	public function index(Request $request) {
		$jumlah_peserta = Peserta::where('active','=',1)->count();
		$jumlah_hadir = Peserta::where('active','=',1)->where('hadir','=',1)->count();
		View::share('jumlah_peserta', $jumlah_peserta);
		View::share('jumlah_hadir', $jumlah_hadir);
		return view ('backend.kehadiran');
	}
	
    public function store(Request $request)
    {
		$peserta = Peserta::where('NIK','=',$request->NIK)->where('active','=',1)->get();
		if (count($peserta)){
			//sudah cek hadir
			if ($peserta[0]->hadir == 1){
				return Redirect::to('/backend/input-hadir/')->with('success', "NIK sudah terdaftar")->with('mode', 'danger');
			} else {
				$update = Peserta::find($peserta[0]->id);
				$update->hadir = 1;
				$update->user_modified = Session::get('userinfo')['user_id'];
				if ($update->save()){
					return Redirect::to('/backend/input-hadir/')->with('success', "Data saved successfully")->with('mode', 'success')->with('data', $peserta);
				}
			}
		} else {
			return Redirect::to('/backend/input-hadir/')->with('success', "NIK tidak ditemukan")->with('mode', 'danger');
		}
    }
	
}