<?php


namespace App\Http\Controllers\Backend;

use Session;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Model\Peserta;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use View;
 
class DashboardController extends Controller {
	public function dashboard(Request $request) {
		$jumlah_peserta = Peserta::where('active','=',1)->count();
		$jumlah_hadir = Peserta::where('active','=',1)->where('hadir','=',1)->count();
		$jumlah_tidak_hadir = Peserta::where('active','=',1)->where('hadir','=',0)->count();
		View::share('jumlah_peserta', $jumlah_peserta);
		View::share('jumlah_hadir', $jumlah_hadir);
		View::share('jumlah_tidak_hadir', $jumlah_tidak_hadir);
		return view ('backend.dashboard');
	}
}