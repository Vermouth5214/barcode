<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return redirect('backend/');
});

Route::get('/display','DisplayController@index');
Route::get('undian/auto', 'DisplayController@auto');

Route::match(array('GET','POST'),'/backend/login','Backend\LoginController@index');

/* SUPER ADMIN */
Route::group(array('prefix' => 'backend','middleware'=> ['token_super_admin']), function()
{
	Route::resource('/modules', 'Backend\ModuleController');
	Route::get('/datatable/module','Backend\ModuleController@datatable');
});

/* ACCESS CONTROL EDIT */
Route::group(array('prefix' => 'backend','middleware'=> ['token_admin', 'token_edit']), function()
{
	Route::get('/users-level/{id}/edit','Backend\UserLevelController@edit');
	Route::match(array('PUT','PATCH'),'/users-level/{id}','Backend\UserLevelController@update');

	Route::get('/users-user/{id}/edit','Backend\UserController@edit');
    Route::match(array('PUT','PATCH'),'/users-user/{id}','Backend\UserController@update');

	Route::get('/daftar-peserta/{id}/edit','Backend\PesertaController@edit');
    Route::match(array('PUT','PATCH'),'/daftar-peserta/{id}','Backend\PesertaController@update');

	Route::get('/daftar-hadiah/{id}/edit','Backend\HadiahController@edit');
    Route::match(array('PUT','PATCH'),'/daftar-hadiah/{id}','Backend\HadiahController@update');
	
});

/* ACCESS CONTROL ALL */
Route::group(array('prefix' => 'backend','middleware'=> ['token_admin', 'token_all']), function()
{
	Route::get('/users-level/create','Backend\UserLevelController@create');
	Route::post('/users-level','Backend\UserLevelController@store');
	Route::delete('/users-level/{id}','Backend\UserLevelController@destroy');
	
	Route::get('/users-user/create','Backend\UserController@create');
	Route::post('/users-user','Backend\UserController@store');
    Route::delete('/users-user/{id}','Backend\UserController@destroy');
    Route::post('/users-user/delete','Backend\UserController@deleteAll');

	Route::get('/media-library/upload','Backend\MediaLibraryController@upload');
	Route::post('/media-library/upload','Backend\MediaLibraryController@upload');	
    Route::delete('/media-library/{id}','Backend\MediaLibraryController@destroy');
    Route::post('/media-library','Backend\MediaLibraryController@deleteAll');

	Route::get('/daftar-peserta/create','Backend\PesertaController@create');
	Route::post('/daftar-peserta','Backend\PesertaController@store');
    Route::delete('/daftar-peserta/{id}','Backend\PesertaController@destroy');

	Route::get('/daftar-hadiah/create','Backend\HadiahController@create');
	Route::post('/daftar-hadiah','Backend\HadiahController@store');
    Route::delete('/daftar-hadiah/{id}','Backend\HadiahController@destroy');
	
});

/* ACCESS CONTROL VIEW */
Route::group(array('prefix' => 'backend','middleware'=> ['token_admin']), function()
{
	Route::get('',function (){return Redirect::to('backend/dashboard');});
	Route::get('/logout','Backend\LoginController@logout');
	
	Route::get('/dashboard','Backend\DashboardController@dashboard');

	Route::get('/users-level/datatable','Backend\UserLevelController@datatable');	
	Route::get('/users-level','Backend\UserLevelController@index');
	Route::get('/users-level/{id}','Backend\UserLevelController@show');
	
	Route::get('/users-user/datatable','Backend\UserController@datatable');
	Route::get('/users-user','Backend\UserController@index');
	Route::get('/users-user/{id}','Backend\UserController@show');
    Route::get('/user/export/{type}','ExcelController@export_user');

	Route::get('/media-library/datatable/','Backend\MediaLibraryController@datatable');
	Route::get('/media-library','Backend\MediaLibraryController@index');
	Route::get('/media-library/popup-media/{from}/{id_count}','Backend\MediaLibraryController@popup_media');
    Route::get('/media-library/popup-media-gallery/','Backend\MediaLibraryController@popup_media_gallery');
    Route::get('/media-library/popup-media-editor/{id_count}','Backend\MediaLibraryController@popup_media_editor');
	
	Route::get('/access-control','Backend\AccessControlController@index');
	Route::post('/access-control','Backend\AccessControlController@update');

	Route::get('/setting','Backend\SettingController@index');
	Route::post('/setting','Backend\SettingController@update');
    
	Route::get('/daftar-peserta/datatable','Backend\PesertaController@datatable');
	Route::get('/daftar-peserta','Backend\PesertaController@index');
	Route::get('/daftar-peserta/{id}','Backend\PesertaController@show');

	Route::get('/daftar-hadiah/datatable','Backend\HadiahController@datatable');
	Route::get('/daftar-hadiah','Backend\HadiahController@index');
	Route::get('/daftar-hadiah/{id}','Backend\HadiahController@show');
	
	Route::get('/input-hadir','Backend\KehadiranController@index');
	Route::post('/input-hadir','Backend\KehadiranController@store');

	Route::get('/daftar-undian','Backend\UndianController@index');
	Route::post('/daftar-undian','Backend\UndianController@store');
	Route::post('/undian/stat','Backend\UndianController@ajaxStat');

	Route::get('/verifikasi-undian','Backend\VerifikasiUndianController@index');
	Route::post('/verifikasi-undian','Backend\VerifikasiUndianController@store');

	Route::get('/laporan-undian','Backend\LaporanUndianController@index');
	Route::get('/laporan-undian/datatable','Backend\LaporanUndianController@datatable');

	Route::get('/laporan-kehadiran','Backend\LaporanKehadiranController@index');
	Route::get('/laporan-kehadiran/datatable','Backend\LaporanKehadiranController@datatable');

	Route::get('/verifikasi-undian-batal','Backend\VerifikasiUndianBatalController@index');
	Route::post('/verifikasi-undian-batal','Backend\VerifikasiUndianBatalController@store');

	Route::get('/cek-peserta','Backend\CekPesertaController@index');

});