<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuruController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;
        $attendance = Attendance::with(['classe', 'subject'])->where('user_id','like',$user)->latest();
        // ()->search(request(['search']))
        return view("guru.presensi.index",[
            'title'=> 'presensi',
            'presensi' => $attendance->get()
        ]);
    }
}
