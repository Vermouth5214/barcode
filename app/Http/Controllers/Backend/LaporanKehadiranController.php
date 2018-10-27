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
use Datatables;

class LaporanKehadiranController extends Controller {
	public function index(Request $request) {
		$undian = 2;
		if (isset($_GET['undian'])){
			$undian = $_GET['undian'];
		}
		$status = 2;
		if (isset($_GET['status']) && $_GET['status']!=""){
			$status = $_GET['status'];
		}else{
			$status = 2;
		}
        view()->share('status',$status);
        view()->share('undian',$undian);
		return view ('backend.laporan_kehadiran');
	}

	public function datatable() {
		$userinfo = Session::get('userinfo');
		$undian = 2;
		if (isset($_GET['undian'])){
			$undian = $_GET['undian'];
		}
		$status = 2;
		if (isset($_GET['status'])){
			$status = $_GET['status'];
        }
		if ($status == 2){
			$peserta = Peserta::where('peserta.active', '!=', 0);
		} else {
			$peserta = Peserta::where('peserta.active', '!=', 0)->where('hadir','=',$status);
		}
        
		if ($undian == 2){
			if ($status == 2){
                $peserta = Peserta::where('peserta.active', '!=', 0);
			} else {
                $peserta = Peserta::where('peserta.active', '!=', 0)->where('hadir','=',$status);
			}
		} else {
			if ($status == 2){
                $peserta = Peserta::where('peserta.active', '!=', 0)->where('undian','=',$undian);
			} else {
                $peserta = Peserta::where('peserta.active', '!=', 0)->where('undian','=',$undian)->where('hadir','=',$status);
			}
		}

        return Datatables::of($peserta)->make(true);
	}	
}