<?php
namespace App\Http\Controllers\Backend;

use Session;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Model\Undian;
use App\Model\Hadiah;
use Illuminate\Support\Facades\Redirect;
use View;
use Datatables;

class LaporanUndianController extends Controller {
	public function index(Request $request) {
		$hadiah = Hadiah::where('active','=',1)->orderBy('id','asc')->pluck('nama','id')->prepend('Semua',0);
		$id_hadiah = 0;
		if (isset($_GET['id_hadiah'])){
			$id_hadiah = $_GET['id_hadiah'];
		}
		$status = 3;
		if (isset($_GET['status']) && $_GET['status']!=""){
			$status = $_GET['status'];
		}else{
			$status = 3;
		}
		view()->share('status',$status);
		return view ('backend.laporan_undian',['hadiah' => $hadiah, 'id_hadiah' => $id_hadiah]);
	}

	public function datatable() {
		$userinfo = Session::get('userinfo');
		$id_hadiah = 0;
		if (isset($_GET['id_hadiah'])){
			$id_hadiah = $_GET['id_hadiah'];
		}
		$status = 3;
		if (isset($_GET['status'])){
			$status = $_GET['status'];
		}
		if ($id_hadiah == 0){
			if ($status == 3){
				$undian = Undian::select(['undian.*','hadiah.nama','peserta.NIK','peserta.nama as NamaPeserta','peserta.bagian'])
							->leftJoin('hadiah', 'undian.id_hadiah','=','hadiah.id')
							->leftJoin('peserta', 'undian.id_peserta','=','peserta.id')
							->orderBy('undian.id','asc');
			} else {
				$undian = Undian::select(['undian.*','hadiah.nama','peserta.NIK','peserta.nama as NamaPeserta','peserta.bagian'])
							->leftJoin('hadiah', 'undian.id_hadiah','=','hadiah.id')
							->leftJoin('peserta', 'undian.id_peserta','=','peserta.id')
							->where('status','=',$status)
							->orderBy('undian.id','asc');
			}
		} else {
			if ($status == 3){
				$undian = Undian::select(['undian.*','hadiah.nama','peserta.NIK','peserta.nama as NamaPeserta','peserta.bagian'])
							->leftJoin('hadiah', 'undian.id_hadiah','=','hadiah.id')
							->leftJoin('peserta', 'undian.id_peserta','=','peserta.id')
							->where('id_hadiah','=',$id_hadiah)
							->orderBy('undian.id','asc');
			} else {
				$undian = Undian::select(['undian.*','hadiah.nama','peserta.NIK','peserta.nama as NamaPeserta','peserta.bagian'])
							->leftJoin('hadiah', 'undian.id_hadiah','=','hadiah.id')
							->leftJoin('peserta', 'undian.id_peserta','=','peserta.id')
							->where('id_hadiah','=',$id_hadiah)
							->where('status','=',$status)
							->orderBy('undian.id','asc');
			}
		}

        return Datatables::of($undian)->make(true);		
	}	
}