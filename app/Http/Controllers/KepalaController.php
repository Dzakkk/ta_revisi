<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Cuti;
use App\Models\Histori;
use App\Models\Keluarga;
use App\Models\Pangkat;
use App\Models\Pegawai;
use App\Models\Pelatihan;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class KepalaController extends Controller
{
    public function dashboard()
    {
        $jumlah = Biodata::count();
        $boy = Biodata::where('jenis_kelamin', 'L')->count();
        $girl = Biodata::where('jenis_kelamin', 'P')->count();
        return view('kepala_sekolah.component.section', ['jumlah' => $jumlah, 'boy' => $boy, 'girl' => $girl]);
    }
    
    public function pegawai()
    {
        $user = Pegawai::all();
        return view('kepala_sekolah.component.kepegawaian', ['user' => $user]);
    }

    public function biodata()
    {
        $user = Biodata::all();
        return view('kepala_sekolah.component.biodata', ['user' => $user]);
    }

    public function pelatihan()
    {
        $user = Pelatihan::all();
        return view('kepala_sekolah.component.pelatihan', ['user' => $user]);
    }

    public function keluarga()
    {
        $user = Keluarga::all();
        return view('kepala_sekolah.component.keluarga', ['user' => $user]);
    }

    public function histori()
    {
        $user = Histori::all();
        return view('kepala_sekolah.component.histori', ['user' => $user]);
    }

    public function pendidikan()
    {
        $user = Pendidikan::all();
        return view('kepala_sekolah.component.data_pendidikan', ['user' => $user]);
    }

    public function pangkat()
    {
        $user = Pangkat::all();
        return view('kepala_sekolah.component.data_pangkat', ['user' => $user]);
    }

    public function cuti()
    {
        $user = Cuti::all(); // Mendapatkan data Cuti penggun
        return view('kepala_sekolah.component.cuti', ['user' => $user]);
    }
}
