<?php 

namespace App\Http\Controllers\Backend;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Model\Peserta;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Datatables;
use Validator;

class PesertaController extends Controller {
    public function index(Request $request) {
		$status = 2;
		if (isset($_GET['status']) && $_GET['status']!=""){
			$status = $_GET['status'];
		}else{
			$status = 2;
		}
		view()->share('status',$status);
		return view ('backend.peserta.index');
	}

	public function create(){
	    $userinfo = Session::get('userinfo');		
	    return view('backend.peserta.update');
	}
	
    public function show($id)
    {
        //
		$data = Peserta::with(['user_modify', 'media_image_1'])->where('id', $id)->get();
		$userinfo = Session::get('userinfo');
		if ($data->count() > 0){
			return view ('backend.peserta.view', ['data' => $data]);
		}
    }

	public function edit($id){
	    $userinfo = Session::get('userinfo');		
		$data = Peserta::with('media_image_1')->where('peserta.id', $id)->where('peserta.active', '!=', 0)->get();
		$userinfo = Session::get('userinfo');
		if ($data->count() > 0){
			return view('backend.peserta.update', ['data' => $data]);
		}
	}

	public function store(Request $request){
		$validator = Validator::make($request->all(),[]);
		
		$cekNIK = Peserta::where('NIK', $request->NIK)->get()->count();
		$cekNoUndangan = Peserta::where('no_undangan', $request->no_undangan)->get()->count();

		if($cekNIK > 0){
			$validator->getMessageBag()->add('NIK', '*) NIK sudah ada');
		}else if ($cekNoUndangan >0){
			$validator->getMessageBag()->add('NoUndangan', '*) No Undangan sudah ada');
		}else{
			$peserta = new Peserta();
			$peserta->NIK = $request->NIK;
			$peserta->no_undangan = $request->no_undangan;
			$peserta->nama = $request->nama;
			$peserta->bagian = $request->bagian;
			$peserta->user_modified = Session::get('userinfo')['user_id'];
			if($peserta->save()){
				return Redirect::to('/backend/daftar-peserta/')->with('success', "Data saved successfully")->with('mode', 'success');
			}
		}
		return Redirect::to('/backend/daftar-peserta/create')
				->withErrors($validator)
				->withInput();
	}

	public function destroy(Request $request,$id) {
		$data = Peserta::find($id);
		$userinfo = Session::get('userinfo');
		$data->active = 0;
		$data->user_modified = Session::get('userinfo')['user_id'];
		if($data->save()){
			Session::flash('success', 'Data deleted successfully');
			Session::flash('mode', 'success');
			return new JsonResponse(["status"=>true]);
		}else{
			return new JsonResponse(["status"=>false]);
		}
		return new JsonResponse(["status"=>false]);		
	}

	public function update(Request $request,$id){
		$data = Peserta::where('id', $id)->where('active', '!=', 0)->get();
		$userinfo = Session::get('userinfo');
		
		$validator = Validator::make($request->all(),[]);
		
		$cekNIK = Peserta::where('peserta.id','<>',$id)->where('NIK', $request->NIK)->get()->count();
		$cekNoUndangan = Peserta::where('peserta.id','<>',$id)->where('no_undangan', $request->no_undangan)->get()->count();

		if($cekNIK > 0){
			$validator->getMessageBag()->add('NIK', '*) NIK sudah ada');
		}else if ($cekNoUndangan >0){
			$validator->getMessageBag()->add('NoUndangan', '*) No Undangan sudah ada');
		}else{
			$peserta = Peserta::find($id);
			$peserta->NIK = $request->NIK;
			$peserta->no_undangan = $request->no_undangan;
			$peserta->nama = $request->nama;
			$peserta->bagian = $request->bagian;
			$peserta->user_modified = Session::get('userinfo')['user_id'];
			if($peserta->save()){
				return Redirect::to('/backend/daftar-peserta/')->with('success', "Data saved successfully")->with('mode', 'success');
			}
		}

		return Redirect::to('/backend/daftar-peserta/'.$id."/edit")
				->withErrors($validator)
				->withInput();		
	}

	public function datatable() {
		$userinfo = Session::get('userinfo');
		$status = 2;
		if (isset($_GET['status'])){
			$status = $_GET['status'];
		}
		if ($status == 2){
			$peserta = Peserta::where('peserta.active', '!=', 0);
		} else {
			$peserta = Peserta::where('peserta.active', '!=', 0)->where('hadir','=',$status);
		}
	
        return Datatables::of($peserta)
			->addColumn('action', function ($peserta) {
				$userinfo = Session::get('userinfo');
				$access_control = Session::get('access_control');
				$segment =  \Request::segment(2);
				
				$url_edit = url('backend/daftar-peserta/'.$peserta->id.'/edit');
				$url = url('backend/daftar-peserta/'.$peserta->id);
				$view = "<a class='btn-action btn btn-primary btn-view' href='".$url."' title='View'><i class='fa fa-eye'></i></a>";
				$edit = "<a class='btn-action btn btn-info btn-edit' href='".$url_edit."' title='Edit'><i class='fa fa-edit'></i></a>";
				$delete = "<button data-url='".$url."' onclick='return deleteData(this)' class='btn-action btn btn-danger btn-delete' title='Delete'><i class='fa fa-trash-o'></i></button>";
				if (!empty($access_control)) {
					if ($access_control[$userinfo['user_level_id']][$segment] == "v"){
						return $view;
					} else if ($access_control[$userinfo['user_level_id']][$segment] == "vu"){
						return $view." ".$edit;
					} else if ($access_control[$userinfo['user_level_id']][$segment] == "a"){
						return $view." ".$edit." ".$delete;
					}
				} else {
					return "";
				}
            })			
            ->rawColumns(['action'])
            ->make(true);		
	}
}