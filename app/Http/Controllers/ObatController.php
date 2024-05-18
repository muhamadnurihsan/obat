<?php

namespace App\Http\Controllers;

use App\Models\ObatAlkes_m;
use App\Models\Signa_m;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        return view('obat.index');
    }

    public function signa()
    {
        return view('signa.index');
    }

    public function read()
    {
        $obatalkes = Obatalkes_m::all();
        return view('obat.read', ['obat' => $obatalkes]);
    }

    public function read2()
    {
        $signa = Signa_m::all();
        return view('signa.read', ['obat' => $signa]);
    }

    public function showCreate()
    {
        return view('obat.add');
    }
}
