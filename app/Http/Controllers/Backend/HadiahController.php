<?php

namespace App\Http\Controllers\Backend;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Model\Hadiah;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class HadiahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		return view ('backend.hadiah.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view ('backend.hadiah.update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$data = new Hadiah();
		$data->nama = $request->nama;
        $data->jumlah = $request->jumlah;
        $data->urutan = $request->urutan;
		$data->user_modified = Session::get('userinfo')['user_id'];
		if($data->save()){
			return Redirect::to('/backend/daftar-hadiah/')->with('success', "Data saved successfully")->with('mode', 'success');
		}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserLevel  $userLevel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		$data = Hadiah::with(['user_modify'])->where('id', $id)->get();
		$userinfo = Session::get('userinfo');
		if ($data->count() > 0){
			return view ('backend.hadiah.view', ['data' => $data]);
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserLevel  $userLevel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$data = Hadiah::where('id', $id)->where('active', '!=', 0)->get();
		$userinfo = Session::get('userinfo');
		if ($data->count() > 0){
			return view ('backend.hadiah.update', ['data' => $data]);
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserLevel  $userLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		$data = Hadiah::find($id);
		$userinfo = Session::get('userinfo');
		$data->nama = $request->nama;
        $data->jumlah = $request->jumlah;
        $data->urutan = $request->urutan;
		$data->user_modified = Session::get('userinfo')['user_id'];
		if($data->save()){
			return Redirect::to('/backend/daftar-hadiah/')->with('success', "Data saved successfully")->with('mode', 'success');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserLevel  $userLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
		$data = Hadiah::find($id);
		$userinfo = Session::get('userinfo');
		if($userinfo['user_level_id'] <= $data->id){
			$data->active = 0;
			$data->user_modified = Session::get('userinfo')['user_id'];
			if($data->save()){
				Session::flash('success', 'Data deleted successfully');
				Session::flash('mode', 'success');
				return new JsonResponse(["status"=>true]);
			}else{
				return new JsonResponse(["status"=>false]);
			}
		}
		return new JsonResponse(["status"=>false]);		
    }
	
	public function datatable() {	
		$userinfo = Session::get('userinfo');
		$userlevel = Hadiah::where('active', '!=', 0);
        return Datatables::of($userlevel)
			->addColumn('action', function ($userlevel) {
				$userinfo = Session::get('userinfo');
				$access_control = Session::get('access_control');
				$segment =  \Request::segment(2);
				$url_edit = url('backend/daftar-hadiah/'.$userlevel->id.'/edit');
				$url = url('backend/daftar-hadiah/'.$userlevel->id);
				$view = "<a class='btn-action btn btn-primary btn-view' href='".$url."' title='View'><i class='fa fa-eye'></i></a>";
				$edit = "<a class='btn-action btn btn-info btn-edit' href='".$url_edit."' title='Edit'><i class='fa fa-edit'></i></a>";
				$delete = "<button data-url='".$url."' onclick='deleteData(this)' class='btn-action btn btn-danger btn-delete' title='Delete'><i class='fa fa-trash-o'></i></button>";
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
