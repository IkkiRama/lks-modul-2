<?php

namespace App\Http\Controllers;

use App\Models\Attdetail;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index()
    {
        return view("siswa.presensi.index", [
            'title'=>'presensi',
            'detailPresensi'=> Attdetail::latest()->get(),
            'presensi'=> Attendance::with("subject")->where("classe_id","like", auth()->user()->classe_id)->where("date",'like', date("Y-m-d"))->get()
        ]);
    }

    public function create(Attendance $presensi)
    {
        $detailPresensi = Attdetail::where('attendance_id','like', $presensi->id)->where("user_id","like",auth()->user()->id)->first();

        return view("siswa.presensi.tambah", [
            'title'=>'presensi',
            'presensi'=>$presensi->load("subject"),
            // "detailPresensi"=> $detailPresensi,
        ]);


        return redirect('/siswa/presensi')->with("gagal", "Presensi Tidak Tersedia");
    }

    public function store(Request $request, Attendance $presensi)
    {
        $request->validate([
            'attstatus'=> 'required'
        ]);

        Attdetail::create([
            'attendance_id'=> $presensi->id,
            'user_id'=> auth()->user()->id,
            'attstatus'=> $request->attstatus
        ]);

        return redirect('/siswa/presensi')->with("sukses", "Konfirmasi Berhasil Ditambahkan");
    }

    public function edit(Attendance $presensi, Attdetail $attdetail)
    {
        $detailPresensi = $attdetail->where('attendance_id','like', $presensi->id)->where("user_id","like",auth()->user()->id)->first();


        if ($presensi->date === date("Y-m-d") && $detailPresensi !== null) {
            return view("siswa.presensi.ubah", [
                'title'=>'presensi',
                'detailPresensi'=>$detailPresensi,
                'presensi'=>$presensi->load("subject")
            ]);
        }

        return redirect('/siswa/presensi')->with("gagal", "Presensi Tidak Tersedia");

    }

    public function update(Request $request, Attendance $presensi)
    {
        $attdetail = Attdetail::where("attendance_id","like", $presensi->id)->where("user_id","like",auth()->user()->id)->first();

        $validate = $request->validate([
            'attstatus'=> 'required'
        ]);

        $attdetail->update($validate);

        return redirect('/siswa/presensi')->with("sukses", "Konfirmasi Berhasil Diubah");
    }
}
