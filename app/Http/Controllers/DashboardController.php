<?php

namespace App\Http\Controllers;


use App\Models\Arsip;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $arsip = Arsip::select(['id'])->count();
        $pegawai = Pegawai::select(['id'])->count();
        return view('admin.dashboard.dashboard', compact(['arsip', 'pegawai']));
    }
}
