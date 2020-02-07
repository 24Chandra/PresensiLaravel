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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'Backend\\HomeController@index')->name('Home');

Auth::routes();

Route::get('/dashboard', 'Backend\\HomeController@index')->name('home');

Route::group(['prefix' => '/permission'], function()
{
  Route::get('/', 'Backend\\PermissionController@index')->name('Permission');
  Route::post('/create', 'Backend\\PermissionController@create')->name('Permission');
  Route::post('/store', 'Backend\\PermissionController@store')->name('Permission.Simpan');
  Route::get('/edit/{id}', 'Backend\\PermissionController@edit')->name('Permission');
  Route::post('/update', 'Backend\\PermissionController@update')->name('Permission.Update');
  Route::get('/delete/{id}', 'Backend\\PermissionController@delete');
});

Route::group(['prefix' => '/role'], function()
{
  Route::get('/', 'Backend\\RoleController@index')->name('Role');
  Route::get('/create', 'Backend\\RoleController@create')->name('Role');
  Route::post('/store', 'Backend\\RoleController@store')->name('Role.Simpan');
  Route::get('/edit/{id}', 'Backend\\RoleController@edit')->name('Role');
  Route::post('/update', 'Backend\\RoleController@update')->name('Role.Update');
  Route::get('/delete/{id}', 'Backend\\RoleController@delete');
});

Route::group(['prefix' => '/siswa'], function()
{
  Route::get('/', 'Master\\SiswaController@index')->name('Siswa');
  Route::get('/create', 'Master\\SiswaController@create')->name('Siswa');
  Route::post('/store', 'Master\\SiswaController@store')->name('Siswa.Simpan');
  Route::get('/edit/{id}', 'Master\\SiswaController@edit')->name('Siswa');
  Route::post('/update', 'Master\\SiswaController@update')->name('Siswa.Update');
  Route::get('/delete/{id}', 'Master\\SiswaController@delete');
});

Route::group(['prefix' => '/guru'], function()
{
  Route::get('/', 'Master\\GuruController@index')->name('Guru');
  Route::get('/create', 'Master\\GuruController@create')->name('Guru');
  Route::post('/store', 'Master\\GuruController@store')->name('Guru.Simpan');
  Route::get('/edit/{id}', 'Master\\GuruController@edit')->name('Guru');
  Route::post('/update', 'Master\\GuruController@update')->name('Guru.Update');
  Route::get('/delete/{id}', 'Master\\GuruController@delete');
});

Route::group(['prefix' => '/kelas'], function()
{
  Route::get('/', 'Master\\KelasController@index')->name('Kelas');
  Route::get('/create', 'Master\\KelasController@create')->name('Kelas');
  Route::post('/store', 'Master\\KelasController@store')->name('Kelas.Simpan');
  Route::get('/edit/{id}', 'Master\\KelasController@edit')->name('Kelas');
  Route::post('/update', 'Master\\KelasController@update')->name('Kelas.Update');
  Route::get('/delete/{id}', 'Master\\KelasController@delete');
});