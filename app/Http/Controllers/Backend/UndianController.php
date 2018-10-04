<?php
namespace App\Http\Controllers\Backend;

use Session;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Model\Peserta;
use App\Model\Hadiah;
use App\Model\Undian;
use Illuminate\Support\Facades\Redirect;
use View;

class UndianController extends Controller {
	public function index(Request $request) {
		$hadiah = Hadiah::where('active','=',1)->orderBy('id','asc')->pluck('nama','id');
		$id_hadiah = 0;
		if (isset($_GET['id_hadiah'])){
			$id_hadiah = $_GET['id_hadiah'];
			$hadiah_data = Hadiah::where('active','=',1)->where('id','=', $id_hadiah)->get();
			$jumlah_hadiah = 0;
			if (count($hadiah_data)) {
				$jumlah_hadiah = $hadiah_data[0]->jumlah;
			}
			$jumlah_undian = Undian::where('id_hadiah','=',$id_hadiah)->count();
			$jumlah_ditrima = Undian::where('id_hadiah','=',$id_hadiah)->where('status','=',1)->count();
			$jumlah_ditolak = Undian::where('id_hadiah','=',$id_hadiah)->where('status','=',2)->count();
			view()->share('jumlah_hadiah', $jumlah_hadiah);
			view()->share('jumlah_undian', $jumlah_undian);
			view()->share('jumlah_ditrima', $jumlah_ditrima);
			view()->share('jumlah_ditolak', $jumlah_ditolak);
		}
		return view ('backend.undian',['hadiah' => $hadiah, 'id_hadiah' => $id_hadiah]);
	}
	
    public function store(Request $request)
    {
		$hadiah_data = Hadiah::where('active','=',1)->where('id','=', $request->id_hadiah)->get();
		$jumlah_hadiah = 0;
		if (count($hadiah_data)) {
			$jumlah_hadiah = $hadiah_data[0]->jumlah;
		}
		$jumlah_undian = Undian::where('id_hadiah','=',$request->id_hadiah)->count();
		$jumlah_ditolak = Undian::where('id_hadiah','=',$request->id_hadiah)->where('status','=',2)->count();

		if ($jumlah_hadiah == $jumlah_undian - $jumlah_ditolak){
			//jumlah hadiah sama dengan jumlah undian - jumlah ditolak, buat limit jumlah undian
			return Redirect::to('/backend/daftar-undian?id_hadiah='.$request->id_hadiah)->with('success', "Jumlah Undian sudah sama dengan Jumlah Hadiah")->with('mode', 'danger');	
		}

		$peserta = Peserta::where('NIK','=',$request->NIK)->where('active','=',1)->get();
		if (count($peserta)){
			if ($peserta[0]->hadir == 1){
				$cek_nik_undian = Undian::where('id_peserta','=',$peserta[0]->id)->count();
				if ($cek_nik_undian == 0){
					$update = new Undian();
					$update->id_hadiah = $request->id_hadiah;
					$update->id_peserta = $peserta[0]->id;
					$update->status = 0;
					$update->user_modified = Session::get('userinfo')['user_id'];
					if ($update->save()){
						return Redirect::to('/backend/daftar-undian?id_hadiah='.$request->id_hadiah)->with('success', "Data saved successfully")->with('mode', 'success')->with('data', $peserta);
					}
				} else {
					//NIK sudah terdaftar dalam undian
					return Redirect::to('/backend/daftar-undian?id_hadiah='.$request->id_hadiah)->with('success', "NIK sudah terdaftar dalam undian")->with('mode', 'danger');	
				}
			} else {
				//NIK belum input kehadiran
				return Redirect::to('/backend/daftar-undian?id_hadiah='.$request->id_hadiah)->with('success', "NIK belum terdaftar dalam daftar hadir")->with('mode', 'danger');	
			}
		} else {
			return Redirect::to('/backend/daftar-undian?id_hadiah='.$request->id_hadiah)->with('success', "NIK tidak ditemukan")->with('mode', 'danger');
		}
    }
		
	public function ajaxStat(Request $request)
	{
		$id_hadiah = $request->id_hadiah;
		$hadiah_data = Hadiah::where('active','=',1)->where('id','=', $request->id_hadiah)->get();
		$jumlah_hadiah = 0;
		if (count($hadiah_data)) {
			$jumlah_hadiah = $hadiah_data[0]->jumlah;
		}
		$jumlah_undian = Undian::where('id_hadiah','=',$request->id_hadiah)->count();
		$jumlah_ditrima = Undian::where('id_hadiah','=',$id_hadiah)->where('status','=',1)->count();
		$jumlah_ditolak = Undian::where('id_hadiah','=',$request->id_hadiah)->where('status','=',2)->count();

		$result = array();
		$result['jumlah_undian'] = $jumlah_undian;
		$result['jumlah_ditrima'] = $jumlah_ditrima;
		$result['jumlah_ditolak'] = $jumlah_ditolak;
		$result['jumlah_hadiah'] = $jumlah_hadiah;
		return json_encode($result);
	}
}