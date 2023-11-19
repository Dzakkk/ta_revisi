<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\KepalaController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'home'])->name('homr');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');

    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //Compenent Kepala Sekolah
    Route::get('kepala_sekolah/dashboard/pelatihan', [KepalaController::class, 'pelatihan'])->name('kepala_sekolah.storeForm')->middleware('userAkses:kepala_sekolah');
    Route::get('kepala_sekolah/dashboard/keluarga', [KepalaController::class, 'keluarga'])->name('kepala_sekolah.storeForm')->middleware('userAkses:kepala_sekolah');
    Route::get('histori', [KepalaController::class, 'histori'])->name('histori')->middleware('userAkses:kepala_sekolah');
    Route::get('kepala_sekolah/dashboard/cuti', [KepalaController::class, 'cuti'])->name('kepala_sekolah.cuti')->middleware('userAkses:kepala_sekolah');
    Route::get('kepala_sekolah/dashboard/pegawai', [KepalaController::class, 'pegawai'])->name('kepala_sekolah.pegawai')->middleware('userAkses:kepala_sekolah');
    Route::get('kepala_sekolah/dashboard/pangkat', [KepalaController::class, 'pangkat'])->name('kepala_sekolah.pangkat')->middleware('userAkses:kepala_sekolah');
    Route::get('kepala_sekolah/dashboard/biodata', [KepalaController::class, 'biodata'])->name('kepala_sekolah.biodata')->middleware('userAkses:kepala_sekolah');
    Route::get('kepala_sekolah/dashboard/pendidikan', [KepalaController::class, 'pendidikan'])->name('kepala_sekolah.Pendidikan')->middleware('userAkses:kepala_sekolah');


    //Halaman Dashboard
    Route::get('petugas/dashboard', [AdminController::class, 'dashboard'])->name('petugas.dashboard')->middleware('userAkses:petugas');
    Route::get('pegawai/dashboard', [PegawaiController::class, 'dashboard'])->name('pegawai.dashboard')->middleware('userAkses:pegawai');
    Route::get('kepala/dashboard', [KepalaController::class, 'dashboard'])->name('kepalasekolah.dashboard')->middleware('userAkses:kepala_sekolah');

    //Component petugas
    Route::get('petugas/dashboard/pelatihan', [AdminController::class, 'pelatihan'])->name('petugas.storeForm')->middleware('userAkses:petugas');
    Route::get('petugas/dashboard/keluarga', [AdminController::class, 'keluarga'])->name('petugas.storeForm')->middleware('userAkses:petugas');
    Route::get('histori', [AdminController::class, 'histori'])->name('petugas.storeForm')->middleware('userAkses:petugas');
    Route::get('petugas/search', [AdminController::class, 'search']);

    //view data
    Route::get('petugas/dashboard/lakilaki', [AdminController::class, 'lakilaki'])->middleware('userAkses:petugas');
    Route::get('petugas/dashboard/perempuan', [AdminController::class, 'perempuan'])->middleware('userAkses:petugas');

    //Cuti petugas
    Route::get('petugas/dashboard/cuti', [AdminController::class, 'cuti'])->name('petugas.cuti')->middleware('userAkses:petugas');

    //Crud User petugas
    Route::get('petugas/dashboard/pegawai', [AdminController::class, 'pegawai'])->name('petugas.pegawai')->middleware('userAkses:petugas');
    Route::get('petugas/storeUser', [AdminController::class, 'storeUserForm'])->name('petugas.storeForm')->middleware('userAkses:petugas');
    Route::post('petugas/storeUser', [AdminController::class, 'storeUser'])->name('petugas.store')->middleware('userAkses:petugas');
    Route::get('petugas/updateUser/{id}', [AdminController::class, 'updateUserForm'])->name('petugas.updateForm')->middleware('userAkses:petugas');
    Route::put('petugas/updateUser/{id}', [AdminController::class, 'updateUser'])->name('petugas.update')->middleware('userAkses:petugas');
    Route::delete('petugas/pegawai/{id}', [AdminController::class, 'deletePegawai'])->name('pegawai.delete')->middleware('userAkses:petugas');

    //Crud pangkat petugas
    Route::get('petugas/dashboard/pangkat', [AdminController::class, 'pangkat'])->name('petugas.pangkat')->middleware('userAkses:petugas');
    Route::get('petugas/storePangkat', [AdminController::class, 'storePangkatForm'])->name('pangkat.storeForm')->middleware('userAkses:petugas');
    Route::post('petugas/storePangkat', [AdminController::class, 'storePangkat'])->name('pangkat.store')->middleware('userAkses:petugas');
    Route::get('petugas/updatePangkat/{id}', [AdminController::class, 'updatePangkatForm'])->name('pangkat.updateForm')->middleware('userAkses:petugas');
    Route::put('petugas/updatePangkat/{id}', [AdminController::class, 'updatePangkat'])->name('pangkat.update')->middleware('userAkses:petugas');

    //Crud Biodata petugas
    Route::get('petugas/dashboard/biodata', [AdminController::class, 'biodata'])->name('petugas.biodata')->middleware('userAkses:petugas');
    Route::get('petugas/storeBiodata', [AdminController::class, 'storeBiodataForm'])->name('biodata.storeForm')->middleware('userAkses:petugas');
    Route::post('petugas/storeBiodata', [AdminController::class, 'storeBiodata'])->name('biodata.store')->middleware('userAkses:petugas');
    Route::get('petugas/updateBiodata/{id}', [AdminController::class, 'updateBiodataForm'])->name('biodata.updateForm')->middleware('userAkses:petugas');
    Route::put('petugas/updateBiodata/{id}', [AdminController::class, 'updateBiodata'])->name('biodata.update')->middleware('userAkses:petugas');
    Route::delete('petugas/biodata/{id}', [AdminController::class, 'deleteBiodata'])->name('biodata.delete')->middleware('userAkses:petugas');

    //Crud Pendidikan petugas
    Route::get('petugas/dashboard/pendidikan', [AdminController::class, 'pendidikan'])->name('petugas.Pendidikan')->middleware('userAkses:petugas');
    Route::get('petugas/storePendidikan', [AdminController::class, 'storePendidikanForm'])->name('pendidikan.storeForm')->middleware('userAkses:petugas');
    Route::post('petugas/storePendidikan', [AdminController::class, 'storePendidikan'])->name('pendidikan.store')->middleware('userAkses:petugas');
    Route::get('petugas/updatePendidikan/{id}', [AdminController::class, 'updatePendidikanForm'])->name('pendidikan.updateForm')->middleware('userAkses:petugas');
    Route::put('petugas/updatePendidikan/{id}', [AdminController::class, 'updatePendidikan'])->name('pendidikan.update')->middleware('userAkses:petugas');

    //Biodata pegawai
    Route::get('pegawai/dashboard/biodata', [PegawaiController::class, 'biodata'])->name('pegawai.biodata')->middleware('userAkses:pegawai');
    Route::get('pegawai/biodata', [PegawaiController::class, 'dataBiodata'])->name('pegawai.databiodata')->middleware('userAkses:pegawai');
    Route::get('pegawai/storeBiodata', [PegawaiController::class, 'storeBiodataForm'])->name('biodata.storeForm')->middleware('userAkses:pegawai');
    Route::post('pegawai/storeBiodata', [PegawaiController::class, 'storeBiodata'])->name('biodata.store')->middleware('userAkses:pegawai');
    Route::get('pegawai/updateBiodata/{id}', [PegawaiController::class, 'updateBiodataForm'])->name('biodata.updateForm')->middleware('userAkses:pegawai');
    Route::put('pegawai/updateBiodata/{id}', [PegawaiController::class, 'updateBiodata'])->name('biodata.update')->middleware('userAkses:pegawai');
    Route::delete('pegawai/biodata/{id}', [PegawaiController::class, 'deleteBiodata'])->name('biodata.delete')->middleware('userAkses:pegawai');

    //Keluarga Pegawai
    Route::get('pegawai/dashboard/keluarga', [PegawaiController::class, 'keluarga'])->name('pegawai.keluarga')->middleware('userAkses:pegawai');
    Route::get('pegawai/keluarga', [PegawaiController::class, 'dataKeluarga'])->name('pegawai.datakeluarga')->middleware('userAkses:pegawai');
    Route::get('pegawai/storeKeluarga', [PegawaiController::class, 'storeKeluargaForm'])->name('Keluarga.storeForm')->middleware('userAkses:pegawai');
    Route::post('pegawai/storeKeluarga', [PegawaiController::class, 'storeKeluarga'])->name('Keluarga.store')->middleware('userAkses:pegawai');
    Route::get('pegawai/updateKeluarga/{id}', [PegawaiController::class, 'updateKeluargaForm'])->name('Keluarga.updateForm')->middleware('userAkses:pegawai');
    Route::put('pegawai/updateKeluarga/{id}', [PegawaiController::class, 'updateKeluarga'])->name('Keluarga.update')->middleware('userAkses:pegawai');
    Route::delete('pegawai/keluarga/{id}', [PegawaiController::class, 'deleteKeluarga'])->name('Keluarga.delete')->middleware('userAkses:pegawai');

    //Anak Pegawai
    // Route::get('pegawai/dashboard/keluarga', [PegawaiController::class, 'keluarga'])->name('pegawai.keluarga')->middleware('userAkses:pegawai');
    // Route::get('pegawai/keluarga', [PegawaiController::class, 'dataKeluarga'])->name('pegawai.datakeluarga')->middleware('userAkses:pegawai');
    Route::get('pegawai/storeChild', [PegawaiController::class, 'storeChildForm'])->name('Keluarga.storeForm')->middleware('userAkses:pegawai');
    Route::post('pegawai/storeChild', [PegawaiController::class, 'storeChild'])->name('Child.store')->middleware('userAkses:pegawai');
    Route::get('pegawai/updateChild/{id}', [PegawaiController::class, 'updateChildForm'])->name('Child.updateForm')->middleware('userAkses:pegawai');
    Route::put('pegawai/updateChild/{id}', [PegawaiController::class, 'updateChild'])->name('Child.update')->middleware('userAkses:pegawai');
    Route::delete('pegawai/child/{id}', [PegawaiController::class, 'deleteChild'])->name('child.delete')->middleware('userAkses:pegawai');

    //Pangkat Pegawai
    Route::get('pegawai/dashboard/pangkat', [PegawaiController::class, 'pangkat'])->name('pegawai.pangkat')->middleware('userAkses:pegawai');
    Route::get('pegawai/pangkat', [PegawaiController::class, 'dataPangkat'])->name('pegawai.dataPangkat')->middleware('userAkses:pegawai');
    Route::get('pegawai/storePangkat', [PegawaiController::class, 'storePangkatForm'])->name('Pangkat.storeForm')->middleware('userAkses:pegawai');
    Route::post('pegawai/storePangkat', [PegawaiController::class, 'storePangkat'])->name('Pangkat.store')->middleware('userAkses:pegawai');
    Route::get('pegawai/updatePangkat/{id}', [PegawaiController::class, 'updatePangkatForm'])->name('Pangkat.updateForm')->middleware('userAkses:pegawai');
    Route::put('pegawai/updatePangkat/{id}', [PegawaiController::class, 'updatePangkat'])->name('Pangkat.update')->middleware('userAkses:pegawai');
    Route::delete('pegawai/pangkat/{id}', [PegawaiController::class, 'deletePangkat'])->name('pangkat.delete')->middleware('userAkses:pegawai');

    //Pendidikan Pegawai
    Route::get('pegawai/dashboard/pendidikan', [PegawaiController::class, 'pendidikan'])->name('pegawai.pendidikan')->middleware('userAkses:pegawai');
    Route::get('pegawai/pendidikan', [PegawaiController::class, 'dataPendidikan'])->name('pegawai.dataPendidikan')->middleware('userAkses:pegawai');
    Route::get('pegawai/storePendidikan', [PegawaiController::class, 'storePendidikanForm'])->name('Pendidikan.storeForm')->middleware('userAkses:pegawai');
    Route::post('pegawai/storePendidikan', [PegawaiController::class, 'storePendidikan'])->name('Pendidikan.store')->middleware('userAkses:pegawai');
    Route::get('pegawai/updatePendidikan/{id}', [PegawaiController::class, 'updatePendidikanForm'])->name('Pendidikan.updateForm')->middleware('userAkses:pegawai');
    Route::put('pegawai/updatePendidikan/{id}', [PegawaiController::class, 'updatePendidikan'])->name('Pendidikan.update')->middleware('userAkses:pegawai');
    Route::delete('pegawai/pendidikan/{id}', [PegawaiController::class, 'deletePangkat'])->name('pangkat.delete')->middleware('userAkses:pegawai');

    //Pelatihan Pegawai
    Route::get('pegawai/dashboard/pelatihan', [PegawaiController::class, 'pelatihan'])->name('pegawai.pelatihan')->middleware('userAkses:pegawai');
    Route::get('pegawai/pelatihan', [PegawaiController::class, 'dataPelatihan'])->name('pegawai.dataPelatihan')->middleware('userAkses:pegawai');
    Route::get('pegawai/storePelatihan', [PegawaiController::class, 'storePelatihanForm'])->name('Pelatihan.storeForm')->middleware('userAkses:pegawai');
    Route::post('pegawai/storePelatihan', [PegawaiController::class, 'storePelatihan'])->name('Pelatihan.store')->middleware('userAkses:pegawai');
    Route::get('pegawai/updatePelatihan/{id}', [PegawaiController::class, 'updatePelatihanForm'])->name('Pelatihan.updateForm')->middleware('userAkses:pegawai');
    Route::put('pegawai/updatePelatihan/{id}', [PegawaiController::class, 'updatePelatihan'])->name('Pelatihan.update')->middleware('userAkses:pegawai');
    Route::delete('pegawai/pelatihan/{id}', [PegawaiController::class, 'deletePelatihan'])->name('Pelatihan.delete')->middleware('userAkses:pegawai');

    //Cuti Pegawai
    Route::get('pegawai/dashboard/cuti', [PegawaiController::class, 'dataCuti'])->name('pegawai.cuti')->middleware('userAkses:pegawai');
    Route::get('pegawai/cuti', [PegawaiController::class, 'dataCuti'])->name('pegawai.dataCuti')->middleware('userAkses:pegawai');
    Route::get('pegawai/storeCuti', [PegawaiController::class, 'storeCutiForm'])->name('Cuti.storeForm')->middleware('userAkses:pegawai');
    Route::post('pegawai/storeCuti', [PegawaiController::class, 'storeCuti'])->name('Cuti.store')->middleware('userAkses:pegawai');
    Route::get('pegawai/updateCuti/{id}', [PegawaiController::class, 'updateCutiForm'])->name('Cuti.updateForm')->middleware('userAkses:pegawai');
    Route::put('pegawai/updateCuti/{id}', [PegawaiController::class, 'updateCuti'])->name('Cuti.update')->middleware('userAkses:pegawai');
    Route::delete('pegawai/cuti/{id}', [PegawaiController::class, 'deleteCuti'])->name('cuti.delete')->middleware('userAkses:pegawai');

    //Component Route
    Route::get('pendidikan/filter', [ComponentController::class, 'filter'])->middleware('userAkses:petugas');
    Route::patch('petugas/pengajuan/{id}', [AdminController::class, 'updateCuti'])->middleware('userAkses:petugas')->name('cuti.updateStatus');

});