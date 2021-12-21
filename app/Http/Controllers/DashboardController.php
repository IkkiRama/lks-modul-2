<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classe;
use App\Models\Attdetail;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // dd("a");
        return view("index",[
                "user"=> User::all(),
                "presensi"=> Attendance::all(),
                "kelas"=> Classe::all(),
                'title'=> 'home'
        ]);

        if (auth()->user()->role==='admin') {

        }else if(auth()->user()->role==='guru'){
            return view("index",[
                "presensi"=> Attendance::where('user_id','like',auth()->user()->id)->count(),
                'title'=> 'home'
            ]);
        }else if(auth()->user()->role==='siswa'){

            $detailPresensi = Attdetail::where("user_id","like",auth()->user()->id)->get();
            return view("index",[
                'title'=> 'home',
                'hadir'=> $detailPresensi->where("attstatus", 'like', 'Hadir')->count(),
                'sakit'=> $detailPresensi->where("attstatus", 'like', 'Sakit')->count(),
                'izin'=> $detailPresensi->where("attstatus", 'like', 'Izin')->count(),
                'alpa'=> $detailPresensi->where("attstatus", 'like', 'Tanpa Keterangan')->count(),
            ]);
        }
    }
}
