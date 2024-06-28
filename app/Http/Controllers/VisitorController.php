<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;

class VisitorController extends Controller
{
    public function index() {
        $pegawai = Pegawai::all();
        return view('users.index', compact('pegawai'));
    }
}
