<?php

namespace App\Http\Controllers;

use App\Events\NipEvent;
use App\Models\Biodata;
use App\Models\Child;
use App\Models\Cuti;
use App\Models\Histori;
use App\Models\Keluarga;
use App\Models\Pangkat;
use App\Models\Pegawai;
use App\Models\Pelatihan;
use App\Models\Pendidikan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    public function dashboard()
    {
        $jumlah = Biodata::count();
        $boy = Biodata::where('jenis_kelamin', 'L')->count();
        $girl = Biodata::where('jenis_kelamin', 'P')->count();

        $s1 = Pendidikan::where('gelar', 'Sarjana')->count();
        $s2 = Pendidikan::where('gelar', 'Magister')->count();
        $s3 = Pendidikan::where('gelar', 'Dokter')->count();
        return view('petugas.component.section', ['jumlah' => $jumlah, 'boy' => $boy, 'girl' => $girl, 's1' => $s1, 's2' => $s2, 's3' => $s3]);
    }

    public function lakilaki()
    {
        $user = Biodata::where('jenis_kelamin', 'L')->get();
        return view('petugas.biodata.biodata', ['user' => $user]);
    }

    public function perempuan()
    {
        $user = Biodata::where('jenis_kelamin', 'P')->get();
        return view('petugas.biodata.biodata', ['user' => $user]);
    }

    public function pegawai()
    {
        $users = Pegawai::all();
    
        $usersWithBirthDate = $users->map(function ($user) {
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
            return $user;
        });
    
        return view('petugas.user.kepegawaian', ['user' => $usersWithBirthDate]);
    }

    public function pelatihan()
    {
        $user = Pelatihan::all();
        $pegawai = Pegawai::all();
        return view('petugas.component.pelatihan', ['user' => $user, 'pegawai' => $pegawai]);
    }

    // public function keluarga()
    // {
    //     $user = Keluarga::all();
    //     return view('petugas.component.keluarga', ['user' => $user]);
    // }

    public function keluarga()
    {

        $families = Keluarga::with('biodata', 'biodata.child')->get();


        return view('petugas.component.keluarga', ['user' => $families]);
    }




    public function histori()
    {
        $user = Histori::all();
        return view('petugas.component.histori', ['user' => $user]);
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

    // public function setujuCuti()
    // {
    //     $user = Cuti::all(); // Mendapatkan data Cuti penggun
    //     return view('petugas.component.cuti', ['user' => $user]);
    // }

    // public function tolakCuti()
    // {
    //     $user = Cuti::all(); // Mendapatkan data Cuti penggun
    //     return view('petugas.component.cuti', ['user' => $user]);
    // }

    public function updateCuti(Request $request, $id)
    {
        $record=Cuti::findOrFail($id);
        $record->status = $request->input('newStatus');
        $record->save();

        return redirect('/petugas/dashboard/cuti');

    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $user = Biodata::where(function ($query) use ($keyword) {
            $query->where('nama', 'like', "%" . $keyword . "%")
                ->orWhere('nik', 'like', "%" . $keyword . "%")
                ->orWhere('nip', 'like', "%" . $keyword . "%")
                ->orWhere('status_perkawinan', 'like', "%" . $keyword . "%")
                ->orWhere('tempat_lahir', 'like', "%" . $keyword . "%")
                ->orWhere('jenis_kelamin', 'like', "%" . $keyword . "%");
        })
            ->paginate(5);

        return view('petugas.biodata.biodata', compact('user'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
