@extends('pegawai.dashboard')

@section('storePendidikanForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/storePendidikan" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Pendidikan Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inpnip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="inpnip" value="{{ Auth::user()->nip }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="tahun_lulus">Tahun Lulus</label>
                <input type="date" name="tahun_lulus" class="form-control" id="tahun_lulus" placeholder="324...">
            </div>
            <div class="col-md-4">
                <label for="gelar" class="form-label">gelar</label>
                <input type="text" name="gelar" id="gelar" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="program">program</label>
                <input type="text" name="program" class="form-control" id="program" placeholder="324...">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="nama_pendidikan">nama_pendidikan</label>
                <input type="text" name="nama_pendidikan" class="form-control" id="nama_pendidikan" placeholder="324...">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
@endsection