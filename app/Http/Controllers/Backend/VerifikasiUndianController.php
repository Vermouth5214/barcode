<?php
namespace App\Http\Controllers\Backend;

use Session;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Model\Undian;
use Illuminate\Support\Facades\Redirect;
use View;

class VerifikasiUndianController extends Controller {
	public function index(Request $request) {
		return view ('backend.verifikasi');
	}
	
	
}