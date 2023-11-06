<?php

namespace App\Http\Controllers;

use App\Events\NipEvent;
use App\Models\Biodata;
use App\Models\Cuti;
use App\Models\Keluarga;
use App\Models\Pangkat;
use App\Models\Pegawai;
use App\Models\Pelatihan;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $jumlah = Biodata::count();
        $boy = Biodata::where('jenis_kelamin', 'L')->count();
        $girl = Biodata::where('jenis_kelamin', 'P')->count();
        return view('petugas.component.section', ['jumlah' => $jumlah, 'boy' => $boy, 'girl' => $girl]);
    }

    public function pegawai()
    {
        $user = Pegawai::all();
        return view('petugas.user.kepegawaian', ['user' => $user]);
    }

    public function pelatihan()
    {
        $user = Pelatihan::all();
        return view('petugas.component.pelatihan', ['user' => $user]);
    }

    public function keluarga()
    {
        $user = Keluarga::all();
        return view('petugas.component.pelatihan', ['user' => $user]);
    }

    public function storeUserForm()
    {
        return view('petugas.user.userForm');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $nipValue = $request->input('nip');

        event(new NipEvent($nipValue));

        Pegawai::create([
            'nip' => $nipValue,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect('/petugas/dashboard/pegawai')->with('success', 'Pegawai created successfully.');
    }


    public function updateUserForm($id)
    {
        $user = Pegawai::find($id);
        return view('petugas.user.updateUserForm', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $data = Pegawai::find($id);
        $data->update($request->all());
        return redirect('/petugas/dashboard/pegawai')->with('DATA WAS UPDATED');
    }

    public function deletePegawai($id)
    {
        $Pegawai = Pegawai::find($id);
        if (!$Pegawai) {
            return redirect('/petugas/dashboard/pegawai')->with('error', 'Pegawai not found.');
        }
        $Pegawai->delete();
        return redirect('/petugas/dashboard/pegawai')->with('success', 'Pegawai deleted successfully.');
    }

    //pangkat table

    public function pangkat()
    {
        $Pegawai = pegawai::all();
        $user = Pangkat::all();
        return view('petugas.pangkat.data_pangkat', ['user' => $user, 'pegawai' => $Pegawai]);
    }

    public function storePangkatForm()
    {
        return view('petugas.pangkat.storePangkat');
    }

    public function storePangkat(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'jabatan' => 'required',
            'TMT' => 'required',
            'pangkat' => 'required',
            'golongan' => 'required',
            'tingkat' => 'required',
        ]);

        Pangkat::create([
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'TMT' => $request->TMT,
            'pangkat' => $request->pangkat,
            'golongan' => $request->golongan,
            'tingkat' => $request->tingkat,
        ]);

        return redirect('/petugas/dashboard/pangkat')->with('success', 'Pegawai created successfully.');
    }

    public function updatePangkatForm($id)
    {
        $user = Pangkat::find($id);
        return view('petugas.pangkat.updatePangkat', compact('user'));
    }

    public function updatePangkat(Request $request, $id)
    {
        $data = Pangkat::find($id);
        $data->update($request->all());
        return redirect('/petugas/dashboard/pangkat')->with('DATA WAS UPDATED');
    }

    //biodata table

    public function biodata()
    {
        $user = Biodata::all();
        return view('petugas.biodata.biodata', ['user' => $user]);
    }

    public function storeBiodataForm()
    {
        return view('petugas.biodata.biodataStore');
    }

    public function storeBiodata(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'status_perkawinan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'telepon' => 'required',
            'karpeg' => 'required',
            'alamat' => 'required',
            'photo_pas' => 'required|file|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        $data = [
            'nik' => $request->nik,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_perkawinan' => $request->status_perkawinan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'telepon' => $request->telepon,
            'karpeg' => $request->karpeg,
            'alamat' => $request->alamat,
           
        ];

        if ($request->hasFile('photo_pas')) {
            $photo_pas = $request->file('photo_pas');
            $photo_pasPath = $photo_pas->storeAs('public/photo_pas', $photo_pas->getClientOriginalName());
            $data['photo_pas'] = $photo_pas->getClientOriginalName();
        } else {
            $photo_pasPath = null;
        }

        Biodata::create($data);

        return redirect('/petugas/dashboard/biodata')->with('success', 'Pegawai created successfully.');
    }


    public function updateBiodataForm($id)
    {
        $user = Biodata::find($id);
        return view('petugas.biodata.biodataUpdate', compact('user'));
    }

    public function updateBiodata(Request $request, $id)
    {
        $data = Biodata::find($id);
        $data->nip = $request->nip;
        $data->nama = $request->nama;
        $data->agama = $request->agama;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->status_perkawinan = $request->status_perkawinan;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->telepon = $request->telepon;
        $data->karpeg = $request->karpeg;
        $data->alamat = $request->alamat;

        // Cek apakah ada file gambar yang diunggah untuk sampul data
        if ($request->hasFile('photo_pas')) {
            // Proses unggah file gambar dan simpan dengan nama yang unik
            $photo_pasPath = $request->file('photo_pas')->storeAs('public/photo_pas', $request->file('photo_pas')->getClientOriginalName());

            // Perbarui nama file sampul data dalam basis data
            $data->photo_pas = $request->file('photo_pas')->getClientOriginalName();
        }

        $data->save();
        return redirect('/petugas/dashboard/biodata')->with('DATA WAS UPDATED');
    }

    public function deleteBiodata($id)
    {
        $Biodata = Biodata::find($id);
        if (!$Biodata) {
            return redirect('/petugas/dashboard/biodata')->with('error', 'Biodata not found.');
        }
        $Biodata->delete();
        return redirect('/petugas/dashboard/biodata')->with('success', 'Biodata deleted successfully.');
    }

    //pendidikan table

    public function Pendidikan()
    {
        $Pegawai = pegawai::all();
        $user = Pendidikan::all();
        return view('petugas.Pendidikan.data_Pendidikan', ['user' => $user, 'pegawai' => $Pegawai]);
    }

    public function storePendidikanForm()
    {
        return view('petugas.Pendidikan.storeDidikForm');
    }

    public function storePendidikan(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama_pendidikan' => 'required',
            'gelar' => 'required',
            'program' => 'required',
            'tahun_lulus' => 'required',
        ]);

        Pendidikan::create([
            'nik' => $request->nik,
            'nama_pendidikan' => $request->nama_pendidikan,
            'gelar' => $request->gelar,
            'program' => $request->program,
            'tahun_lulus' => $request->tahun_lulus,
        ]);

        return redirect('/petugas/dashboard/pendidikan')->with('success', 'Pegawai created successfully.');
    }

    public function updatePendidikanForm($id)
    {
        $user = Pendidikan::find($id);
        return view('petugas.Pendidikan.updateDidikForm', compact('user'));
    }

    public function updatePendidikan(Request $request, $id)
    {
        $data = Pendidikan::find($id);
        $data->update($request->all());
        return redirect('/petugas/dashboard/pendidikan')->with('DATA WAS UPDATED');
    }

    public function cuti()
    {
        $user = Cuti::all(); // Mendapatkan data Cuti penggun
        return view('petugas.component.cuti', ['user' => $user]);
    }
}
