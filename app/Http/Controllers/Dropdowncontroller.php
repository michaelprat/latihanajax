<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modelkota;
use App\modelnegara;
use App\modelkecamatan;
class Dropdowncontroller extends Controller
{
public function DropDown()  //function untuk menampilkan halaman dropdown 
{
    $negara=modelnegara::all();
    return view('DropdownCol',compact('negara'));
}
public function DropDownAjax($id) //menampilkan isi dropdown kedua
{
    $kota=modelkota::where('id_negara','=',$id)->get();
   return json_encode($kota);
}
public function DropDownKecamatan($id)
{
    $kecamatan=modelkecamatan::where('id_kota','=',$id)->get();
    return json_encode($kecamatan);
}
}
