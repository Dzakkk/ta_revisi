<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Child;
use App\Models\Cuti;
use App\Models\Keluarga;
use App\Models\Pangkat;
use App\Models\Pelatihan;
use App\Models\Pendidikan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();

        // Assuming NIP format is YYYYMMDD
        $year = substr($user->nip, 0, 4);
        $month = substr($user->nip, 4, 2);
        $day = substr($user->nip, 6, 2);

        // Create a Carbon instance for the birthdate
        $birthDate = Carbon::createFromDate($year, $month, $day);

        // Calculate the date when the person turns 60
        $turns60Date = $birthDate->addYears(60);

        // Add a new attribute to the user with the calculated date
        $user->turns60Date = $turns60Date->toDateString();

        // Add Tanggal Pengangkatan
        $year1 = substr($user->nip, 8, 4);
        $month1 = substr($user->nip, 12, 2);
        $birthDate1 = Carbon::createFromDate($year1, $month1);
        $user->birthDate1 = $birthDate1->format('Y-m');

        return view('pegawai.component.data_pegawai', ['user' => $user]);
    }


    public function dataBiodata()
    {
        $user = Auth::user(); // Mendapatkan objek pengguna yang sudah terautentikasi
        $biodata = $user->biodata; // Mendapatkan data biodata penggun
        return view('pegawai.biodata.biodata', ['user' => $biodata]);
    }

    // public function storeBiodataForm()
    // {
    //     return view('pegawai.biodata.biodataStore');
    // }
    public function biodata()
    {
        $user = Auth::user();
        $isidata = Biodata::where('nip', $user->nip)->first();

        if ($isidata) {
            if (!empty($isidata->nama) && !empty($isidata->alamat)) {
                // Data biodata sudah lengkap, alihkan ke halaman 'pegawai/biodata'
                return redirect('/pegawai/biodata');
            }
        }

        return view('pegawai.biodata.biodataStore');
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
            'alamat' => 'required',
            'karpeg' => 'required',
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
            'alamat' => $request->alamat,
            'karpeg' => $request->karpeg,


        ];

        if ($request->hasFile('photo_pas')) {
            $photo_pas = $request->file('photo_pas');
            $photo_pasPath = $photo_pas->storeAs('public/photo_pas', $photo_pas->getClientOriginalName());
            $data['photo_pas'] = $photo_pas->getClientOriginalName();
        } else {
            $photo_pasPath = null;
        }

        Biodata::create($data);

        return redirect('/pegawai/dashboard/biodata')->with('success', 'Pegawai created successfully.');
    }


    public function updateBiodataForm($id)
    {
        $user = Biodata::find($id);
        return view('pegawai.biodata.biodataUpdate', compact('user'));
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
        return redirect('/pegawai/dashboard/biodata')->with('DATA WAS UPDATED');
    }

    public function deleteBiodata($id)
    {
        $Biodata = Biodata::find($id);
        if (!$Biodata) {
            return redirect('/pegawai/dashboard/biodata')->with('error', 'Biodata not found.');
        }
        $Biodata->delete();
        return redirect('/pegawai/dashboard/biodata')->with('success', 'Biodata deleted successfully.');
    }

    //keluarga pegawai

    public function dataKeluarga()
    {
        $user = Auth::user();
        $biodata = $user->biodata;

        if ($biodata) {
            $keluarga = $biodata->keluarga;
            $child = $biodata->child;

            return view('pegawai.keluarga.keluarga', ['user' => $keluarga, 'child' => $child]);
        }
        return view('pegawai.keluarga.keluargaStore');
    }

    public function keluarga()
    {
        $user = Auth::user();
        $isidata = $user->biodata->keluarga;

        if ($isidata) {
            if (!empty($isidata->nama_pasangan) && !empty($isidata->tempat_lahir)) {
                // Data Keluarga sudah lengkap, alihkan ke halaman 'pegawai/keluarga'
                return redirect('/pegawai/keluarga');
            }
        }

        return view('pegawai.keluarga.keluargaStore');
    }




    public function storeKeluarga(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama_pasangan' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'dokumen' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        $data = [
            'nik' => $request->nik,
            'nama_pasangan' => $request->nama_pasangan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,

        ];

        if ($request->hasFile('dokumen')) {
            $dokumen = $request->file('dokumen');
            $dokumenPath = $dokumen->storeAs('public/dokumens', $dokumen->getClientOriginalName());
            $data['dokumen'] = $dokumen->getClientOriginalName();
        } else {
            $dokumenPath = null;
        }

        Keluarga::create($data);


        return redirect('/pegawai/dashboard/keluarga')->with('success', 'Pegawai created successfully.');
    }


    public function updateKeluargaForm($id)
    {
        $user = Keluarga::find($id);
        return view('pegawai.Keluarga.KeluargaUpdate', compact('user'));
    }

    public function updateKeluarga(Request $request, $id)
    {
        $data = Keluarga::find($id);

        $data->nik = $request->nik;
        $data->nama_pasangan = $request->nama_pasangan;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;


        // Cek apakah ada file gambar yang diunggah untuk sampul data
        if ($request->hasFile('dokumen')) {
            // Proses unggah file gambar dan simpan dengan nama yang unik
            $dokumenPath = $request->file('dokumen')->storeAs('public/dokumens', $request->file('dokumen')->getClientOriginalName());

            // Perbarui nama file sampul data dalam basis data
            $data->dokumen = $request->file('dokumen')->getClientOriginalName();
        }

        $data->save();
        return redirect('/pegawai/dashboard/keluarga')->with('DATA WAS UPDATED');
    }

    public function deleteKeluarga($id)
    {
        $Keluarga = Keluarga::find($id);
        if (!$Keluarga) {
            return redirect('/pegawai/dashboard/keluarga')->with('error', 'Keluarga not found.');
        }
        $Keluarga->delete();
        return redirect('/pegawai/dashboard/keluarga')->with('success', 'Keluarga deleted successfully.');
    }

    //Child
    public function storeChildForm()
    {
        return view('pegawai.keluarga.storeChild');
    }

    public function storeChild(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama_anak' => 'required',
            'jenis_kelamin' => 'required',
            'pendidikan' => 'required',
            'waktu_masuk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        Child::create([
            'nik' => $request->nik,
            'nama_anak' => $request->nama_anak,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan' => $request->pendidikan,
            'waktu_masuk' => $request->waktu_masuk,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,

        ]);

        return redirect('/pegawai/dashboard/keluarga')->with('success', 'Pegawai created successfully.');
    }

    public function updateChildForm($id)
    {
        $user = Child::find($id);
        return view('pegawai.keluarga.updateChild', compact('user'));
    }

    public function updateChild(Request $request, $id)
    {
        $data = Child::find($id);
        $data->update($request->all());
        return redirect('/pegawai/dashboard/keluarga')->with('DATA WAS UPDATED');
    }

    //Pangkat Pegawai

    public function dataPangkat()
    {
        $user = Auth::user(); // Mendapatkan objek pengguna yang sudah terautentikasi
        $Pangkat = $user->pangkat; // Mendapatkan data Pangkat penggun
        return view('pegawai.pangkat.pangkat', ['user' => $Pangkat]);
    }

    public function pangkat()
    {
        $user = Auth::user();
        $isidata = Pangkat::where('nip', $user->nip)->first();

        if ($isidata) {
            if (!empty($isidata->jabatan) && !empty($isidata->golongan)) {
                // Data Pangkat sudah lengkap, alihkan ke halaman 'pegawai/Pangkat'
                return redirect('/pegawai/pangkat');
            }
        }

        return view('pegawai.Pangkat.PangkatStore');
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

        return redirect('/pegawai/dashboard/pangkat')->with('success', 'Pegawai created successfully.');
    }


    public function updatePangkatForm($id)
    {
        $user = Pangkat::find($id);
        return view('pegawai.pangkat.pangkatUpdate', compact('user'));
    }

    public function updatePangkat(Request $request, $id)
    {
        $data = Pangkat::find($id);
        $data->update($request->all());
        return redirect('/pegawai/dashboard/pangkat')->with('DATA WAS UPDATED');
    }

    public function deletePangkat($id)
    {
        $pangkat = Pangkat::find($id);
        if (!$pangkat) {
            return redirect('/pegawai/dashboard/pangkat')->with('error', 'pangkat not found.');
        }
        $pangkat->delete();
        return redirect('/pegawai/dashboard/pangkat')->with('success', 'pangkat deleted successfully.');
    }

    //Pendidikan pegawai

    public function dataPendidikan()
    {
        $user = Auth::user(); // Mendapatkan objek pengguna yang sudah terautentikasi
        $pendidikan = $user->pendidikan; // Mendapatkan data pendidikan penggun
        return view('pegawai.pendidikan.pendidikan', ['user' => $pendidikan]);
    }

    public function pendidikan()
    {
        $user = Auth::user();
        $isidata = Pendidikan::where('nip', $user->nip)->first();

        if ($isidata) {
            if (!empty($isidata->nama_pendidikan) && !empty($isidata->gelar)) {
                // Data Pangkat sudah lengkap, alihkan ke halaman 'pegawai/Pangkat'
                return redirect('/pegawai/pendidikan');
            }
        }

        return view('pegawai.pendidikan.pendidikanStore');
    }


    public function storePendidikan(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama_pendidikan' => 'required',
            'gelar' => 'required',
            'program' => 'required',
            'tahun_lulus' => 'required',
        ]);

        Pendidikan::create([
            'nip' => $request->nip,
            'nama_pendidikan' => $request->nama_pendidikan,
            'gelar' => $request->gelar,
            'program' => $request->program,
            'tahun_lulus' => $request->tahun_lulus,
        ]);

        return redirect('/pegawai/dashboard/pendidikan')->with('success', 'Pegawai created successfully.');
    }


    public function updatePendidikanForm($id)
    {
        $user = Pendidikan::find($id);
        return view('pegawai.pendidikan.pendidikanUpdate', compact('user'));
    }

    public function updatePendidikan(Request $request, $id)
    {
        $data = Pendidikan::find($id);
        $data->update($request->all());
        return redirect('/pegawai/dashboard/pangkat')->with('DATA WAS UPDATED');
    }

    public function deletePendidikan($id)
    {
        $pendidikan = Pendidikan::find($id);
        if (!$pendidikan) {
            return redirect('/pegawai/dashboard/pendidikan')->with('error', 'pendidikan not found.');
        }
        $pendidikan->delete();
        return redirect('/pegawai/dashboard/pendidikan')->with('success', 'pendidikan deleted successfully.');
    }

    //pelatihan
    public function dataPelatihan()
    {
        $pelatihan = Auth::user(); // Mendapatkan objek pengguna yang sudah terautentikasi
        $user = $pelatihan->pelatihan; // Mendapatkan data pelatihan penggun
        return view('pegawai.pelatihan.pelatihan', ['user' => $user]);
    }

    public function pelatihan()
    {
        return view('pegawai.pelatihan.pelatihanStore');
    }


    public function storePelatihan(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama_pelatihan' => 'required',
            'waktu_pelatihan' => 'required',
            'jenis_pelatihan' => 'required',
            'lama_pelatihan' => 'required',
            'dokumen' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'nip' => $request->nip,
            'nama_pelatihan' => $request->nama_pelatihan,
            'waktu_pelatihan' => $request->waktu_pelatihan,
            'jenis_pelatihan' => $request->jenis_pelatihan,
            'lama_pelatihan' => $request->lama_pelatihan,
        ];

        if ($request->hasFile('dokumen')) {
            $dokumen = $request->file('dokumen');
            $dokumenPath = $dokumen->storeAs('public/dokumens', $dokumen->getClientOriginalName());
            $data['dokumen'] = $dokumen->getClientOriginalName();
        } else {
            $dokumenPath = null;
        }

        Pelatihan::create($data);

        return redirect('/pegawai/dashboard/pelatihan')->with('success', 'Pegawai created successfully.');
    }


    public function updatePelatihanForm($id)
    {
        $user = Pendidikan::find($id);
        return view('pegawai.pelatihan.pelatihanUpdate', compact('user'));
    }

    public function updatePelatihan(Request $request, $id)
    {
        $data = Pelatihan::find($id);
        $data->nip = $request->nip;
        $data->pelatihan = $request->pelatihan;
        $data->waktu_pelatihan = $request->waktu_pelatihan;

        // Cek apakah ada file gambar yang diunggah untuk sampul data
        if ($request->hasFile('dokumen')) {
            // Proses unggah file gambar dan simpan dengan nama yang unik
            $dokumenPath = $request->file('dokumen')->storeAs('public/dokumens', $request->file('dokumen')->getClientOriginalName());

            // Perbarui nama file sampul data dalam basis data
            $data->dokumen = $request->file('dokumen')->getClientOriginalName();
        }

        $data->save();
        return redirect('/pegawai/dashboard/pelatihan')->with('DATA WAS UPDATED');
    }

    public function deletePelatihan($id)
    {
        $Pendidikan = Pendidikan::find($id);
        if (!$Pendidikan) {
            return redirect('/pegawai/dashboard/pelatihan')->with('error', 'Pendidikan not found.');
        }
        $Pendidikan->delete();
        return redirect('/pegawai/dashboard/pelatihan')->with('success', 'Pendidikan deleted successfully.');
    }

    //cuti

    public function dataCuti()
    {
        $cutiPegawai = Auth::user(); // Mendapatkan objek pengguna yang sudah terautentikasi
        $user = $cutiPegawai->cuti; // Mendapatkan data Cuti penggun
        return view('pegawai.cuti.cuti', ['user' => $user]);
    }

    public function storeCutiForm()
    {
        return view('pegawai.cuti.cutiStore');
    }


    public function storeCuti(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'TMT_cuti' => 'required',
            'keterangan' => 'required',
            'selesai' => 'required',
            'dokumen' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'nip' => $request->nip,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'TMT_cuti' => $request->TMT_cuti,
            'selesai' => $request->selesai,

        ];

        if ($request->hasFile('dokumen')) {
            $dokumen = $request->file('dokumen');
            $dokumenPath = $dokumen->storeAs('public/dokumens', $dokumen->getClientOriginalName());
            $data['dokumen'] = $dokumen->getClientOriginalName();
        } else {
            $dokumenPath = null;
        }

        Cuti::create($data);

        return redirect('/pegawai/cuti')->with('success', 'Pegawai created successfully.');
    }


    public function updateCutiForm($id)
    {
        $user = Cuti::find($id);
        return view('pegawai.pelatihan.pelatihanUpdate', compact('user'));
    }

    public function updateCuti(Request $request, $id)
    {
        $data = Cuti::find($id);
        $data->nip = $request->nip;
        $data->cuti = $request->cuti;
        $data->waktu_cuti = $request->waktu_cuti;

        // Cek apakah ada file gambar yang diunggah untuk sampul data
        if ($request->hasFile('dokumen')) {
            // Proses unggah file gambar dan simpan dengan nama yang unik
            $dokumenPath = $request->file('dokumen')->storeAs('public/dokumens', $request->file('dokumen')->getClientOriginalName());

            // Perbarui nama file sampul data dalam basis data
            $data->dokumen = $request->file('dokumen')->getClientOriginalName();
        }

        $data->save();
        return redirect('/pegawai/dashboard/pelatihan')->with('DATA WAS UPDATED');
    }

    public function deleteCuti($id)
    {
        $Pendidikan = Pendidikan::find($id);
        if (!$Pendidikan) {
            return redirect('/pegawai/dashboard/pelatihan')->with('error', 'Pendidikan not found.');
        }
        $Pendidikan->delete();
        return redirect('/pegawai/dashboard/pelatihan')->with('success', 'Pendidikan deleted successfully.');
    }
}
