<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Subject;
use App\Models\Attdetail;
use App\Models\Attendance;
use Illuminate\Http\Request;
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
        dd($subject);
        Attdetail::where("attendance_id","like",$presensi->id)->delete();
        $presensi->delete();
        return redirect('/guru/presensi')->with("sukses", "Data Berhasil Dihapus");
    }

}
