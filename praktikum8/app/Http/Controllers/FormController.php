<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    
    public function index(){
        return view('form');
        }

        public function Cetak(Request $request)
        {
              
        $this->validate($request, [
            'nama' => 'required|min:5|max:20',
            'ttl' => 'required',
            'jk' => 'required',
            'hobi' => 'required',
            ]);
            
            $nama = $request['nama'];
            $ttl = $request['ttl'];
            $jk = $request['jk'];
            $hobi = $request['hobi'];
            // dd($nama);
            return view('form', compact('nama','ttl','jk','hobi'));
            
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


        public function daftar()
    {
        $ar_kategori = ["Dosen", "Mahasiswa", "Staff", "Alumni"];
        return view('user/daftar', ['kategori'=>$ar_kategori]);
    }


    public function store(Request $request){
        $nama = $request->input('nama');
        $email = $request->input('email');
        $kategori = $request->input('kategori');
        $alamat = $request->input('alamat');
        return view('user/sukses',
            ['nama'=>$nama, 'email'=>$email, 'kategori'=>$kategori, 'alamat'=>$alamat]);
    }
    }
