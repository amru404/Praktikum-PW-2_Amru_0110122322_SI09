<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilController extends Controller
{
    //
    public function index(Request $request){
        $nama = $request['nama'];
        $ttl = $request['ttl'];
        $jk = $request['jk'];
        $hobi = $request['hobi'];
        // dd($nama);
        return view('hasil', compact('nama','ttl','jk','hobi'));
        }
    public function hasil(Request $request){
        
        $this->validate($request, [
        'nama' => 'required|min:5|max:20',
        'ttl' => 'required',
        'jk' => 'required',
        'hobi' => 'required',
        ]);
        return view('hasil', ['data' => $request]);
        }
}
