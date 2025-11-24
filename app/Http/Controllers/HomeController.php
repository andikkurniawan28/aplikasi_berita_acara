<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Dokumen;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\JenisKendaraan;

class HomeController extends Controller
{
    public function index(){
        $dokumens = Dokumen::all();
        $kasuss = Kasus::all();
        $kendaraans = JenisKendaraan::all();
        $materials = Material::all();
        $kronologi_default = Kasus::get()->first()->kronologi;
        return view('welcome', compact('dokumens', 'kasuss', 'kendaraans', 'materials', 'kronologi_default'));
    }

    public function process(Request $request){
        return $request;
    }
}
