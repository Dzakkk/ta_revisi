@extends('petugas.dashboard')

@section('storePendidikanForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/petugas/storePendidikan" method="POST">
            @csrf
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Pendidikan Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">nik</label>
                <input type="text" name="nik" class="form-control" id="inputnik4">
            </div>
            <div class="col-md-12">
                <label for="nama" class="form-label">Nama pendidikan</label>
                <input type="text" name="nama_pendidikan" class="form-control" id="nama" placeholder="Univ.. A">
            </div>
            <div class="col-md-4">
                <label for="inputgelar" class="form-label">gelar</label>
                <input type="text" name="gelar" class="form-control" id="inputgelar">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="program">program</label>
                <input type="text" name="program" class="form-control" id="program" placeholder="324...">
            </div>
            <div class="col-md-6">
                <label for="karpeg" class="form-label">tanggal lulus</label>
                <input type="date" name="tahun_lulus" id="karpeg" class="form-control">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
@endsection