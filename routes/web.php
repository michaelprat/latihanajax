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
    return view('welcome');
});
Route::get('DropDown','DropdownController@DropDown');//halaman utama
Route::get('DropDown/ajax/{id}','DropdownController@DropDownAjax');//mengambil data untuk dropdown kedua
Route::get('DropDownKecamatan/ajax/{id}','DropdownController@DropDownKecamatan');