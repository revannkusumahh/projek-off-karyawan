<?php

namespace App\Http\Controllers;

use App\Models\OffKaryawan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OffKaryawanController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan;

        $data = OffKaryawan::when($bulan, function ($query) use ($bulan) {
            $query->where('bulan', $bulan);
        })
        ->orderBy('schedule', 'asc')
        ->get();

        return view('welcome', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required',
            'nama' => 'required',
            'off_terakhir' => 'required',
            'schedule' => 'required',
            'realisasi' => 'nullable'
        ]);

        $offTerakhir = Carbon::parse($request->off_terakhir);
        $schedule = Carbon::parse($request->schedule);

        $selisihHari = $offTerakhir->diffInDays($schedule);

        if ($selisihHari >= 22) {
            $status = 'SUDAH BISA OFF';
        } else {
            $status = 'BELUM 22 HARI';
        }

        OffKaryawan::create([
            'bulan' => $request->bulan,
            'nama' => $request->nama,
            'off_terakhir' => $request->off_terakhir,
            'schedule' => $request->schedule,
            'realisasi' => $request->realisasi,
            'status' => $status,
            'selisih_hari' => $selisihHari
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        OffKaryawan::findOrFail($id)->delete();

        return redirect('/');
    }
}