<?php
namespace App\Http\Controllers\Backend;

use Session;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Model\Undian;
use App\Model\Peserta;
use Illuminate\Support\Facades\Redirect;
use View;

class VerifikasiUndianController extends Controller {
	public function index(Request $request) {
		if (isset($_GET['NIK'])){
			$NIK = $_GET['NIK'];
			$peserta = Peserta::where('NIK','=',$request->NIK)->where('active','=',1)->get();
			if (count($peserta)){
				//sudah cek hadir apa belum
				if ($peserta[0]->hadir == 0){
					return Redirect::to('/backend/verifikasi-undian/')->with('success', "NIK belum terdaftar dalam daftar hadir")->with('mode', 'danger');
				} else {
					$undian = Undian::with(['hadiah','peserta'])->where('id_peserta','=',$peserta[0]->id)->get();
					if (count($undian)){
						if ($undian[0]->status == 0){
							//belum verifikasi
							View::share('undian', $undian);
						} else 
						if ($undian[0]->status == 1){
							//sudah diterima
							return Redirect::to('/backend/verifikasi-undian/')->with('success', "NIK sudah diterima verifikasi")->with('mode', 'danger');
						} else 
						if ($undian[0]->status == 2){
							//sudah ditolak
							return Redirect::to('/backend/verifikasi-undian/')->with('success', "NIK sudah ditolak verifikasi")->with('mode', 'danger');
						}
					} else {
						return Redirect::to('/backend/verifikasi-undian/')->with('success', "NIK tidak terdaftar dalam undian")->with('mode', 'danger');
					}
				}
			} else {
				return Redirect::to('/backend/verifikasi-undian/')->with('success', "NIK tidak ditemukan")->with('mode', 'danger');
			}

		}
		return view ('backend.verifikasi');
	}
	
	public function store (Request $request){
		$update = Undian::find($request->id_undian);
		$update->status = $request->status;
		$update->keterangan = $request->keterangan;
		$update->user_modified = Session::get('userinfo')['user_id'];
		if ($update->save()){
			return Redirect::to('/backend/verifikasi-undian/')->with('success', "Data saved successfully")->with('mode', 'success');
		}
	}
	
}