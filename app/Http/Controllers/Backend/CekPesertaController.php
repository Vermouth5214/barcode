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

class CekPesertaController extends Controller {
	public function index(Request $request) {
        if (isset($_GET['NIK'])){
            $peserta = Peserta::where('NIK','=',$request->NIK)->where('active','=',1)->get();
            if (count($peserta)){
                return Redirect::to('/backend/cek-peserta/')->with('success', "Data ditemukan")->with('mode', 'success')->with('data', $peserta);
            } else {
                return Redirect::to('/backend/cek-peserta/')->with('success', "NIK tidak ditemukan")->with('mode', 'danger');
            }
    
        }
		return view ('backend.cek_peserta');
	}
	
	
}