<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
{
return view('form');
}
public function hasil(Request $request)
{
$this->validate($request, [
'nama' => 'required|min:5|max:20',
'ttl' => 'required',
'jenis_kelamin' => 'required',
'hobi' => 'required',
]);
return view('hasil', ['data' => $request]);
}
}
