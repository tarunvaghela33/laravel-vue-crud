<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::count();
        $kelas = Kelas::count();
        $users = User::count();
        return response()->json(compact('siswa','kelas','users'));
    }
}
