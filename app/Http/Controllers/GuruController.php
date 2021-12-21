<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Subject;
use App\Models\Attdetail;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class GuruController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;
        $attendance = Attendance::with(['classe', 'subject'])->where('user_id','like',$user)->latest()->search(request(['search']));
        return view("guru.presensi.index",[
            'title'=> 'presensi',
            'presensi' => $attendance->get()
        ]);
    }

    public function create()
    {
        return view("guru.presensi.tambah",[
            'title'=> 'presensi',
            'kelas'=> Classe::all(),
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title'=> 'required|max:150',
            'topic'=> 'required|max:150',
            'kelas'=> 'required',
            'date'=> 'required|date',
        ]);

        $subject = new  Subject();
        $subject->name = $request->title;
        $subject->save();

        $request->request->add(['subject_id' => $subject->id]);

        Attendance::create([
            'user_id' => auth()->user()->id,
            'subject_id' => $request->subject_id,
            'classe_id'=> $request->kelas,
            'date'=> $request->date,
            'topic'=> $request->topic
        ]);

        return redirect('/guru/presensi')->with("sukses", "Data Berhasil Ditambahkan");
    }

    public function show(Attendance $presensi)
    {
        $detailPresensi = Attdetail::where("attendance_id","like", $presensi->id)->latest()->search(request(["search"]));

        return view("guru.presensi.detail",[
            'title'=> 'presensi',
            'detailPresensi'=> $detailPresensi->get(),
            'hadir'=> $detailPresensi->where("attstatus", 'like', 'Hadir')->count(),
            'sakit'=> $detailPresensi->where("attstatus", 'like', 'Sakit')->count(),
            'izin'=> $detailPresensi->where("attstatus", 'like', 'Izin')->count(),
            'alpa'=> $detailPresensi->where("attstatus", 'like', 'Tanpa Keterangan')->count(),
        ]);

    }


    public function edit(Attendance $presensi)
    {
        return view("guru.presensi.ubah",[
            'title'=> 'presensi',
            'presensi' => $presensi,
            'kelas'=> Classe::all()
        ]);
    }

    public function update(Request $request, Attendance $presensi)
    {
        $request->validate([
            'title'=> 'required|max:150',
            'topic'=> 'required|max:150',
            'kelas'=> 'required',
            'date'=> 'required|date',
        ]);

        Subject::where("id",'like', $presensi->subject_id)->update([
            'name'=> $request->title
        ]);

        $presensi->update([
            'classe_id'=> $request->kelas,
            'date'=> $request->date,
            'topic'=> $request->topic
        ]);

        return redirect('/guru/presensi')->with("sukses", "Data Berhasil Diubah");
    }


    public function destroy(Attendance $presensi)
    {
        $subject = Subject::where("id", "like",$presensi->subject_id)->delete();
        Attdetail::where("attendance_id","like",$presensi->id)->delete();
        $presensi->delete();
        return redirect('/guru/presensi')->with("sukses", "Data Berhasil Dihapus");
    }

    public function exportPDF()
    {
        $user = auth()->user()->id;
        $presensi = Attendance::with(['classe', 'subject'])->where('user_id','like',$user)->latest()->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf = $pdf->loadView('guru.laporan', ['presensi' => $presensi]);
        return $pdf->download('invoice.pdf');
    }

    public function exportDetailPDF(Attendance $presensi)
    {
        $detailPresensi = Attdetail::with(['user'])->where("attendance_id",'like', $presensi->id)->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf = $pdf->loadView('admin.laporanDetail', [
            'presensi' => $presensi->load("classe", "subject"),
            'detailPresensi'=> $detailPresensi,
            'hadir'=> $detailPresensi->where("attstatus", 'like', 'Hadir')->count(),
            'sakit'=> $detailPresensi->where("attstatus", 'like', 'Sakit')->count(),
            'izin'=> $detailPresensi->where("attstatus", 'like', 'Izin')->count(),
            'alpa'=> $detailPresensi->where("attstatus", 'like', 'Tanpa Keterangan')->count(),
            'rataRataKehadiran'=> $detailPresensi->where("attstatus", 'like', 'Hadir')->count() / $detailPresensi->count() * 100
        ]);
        return $pdf->download('invoice.pdf');
    }



}
