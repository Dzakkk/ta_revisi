@extends('petugas.dashboard')

@section('updateBiodataForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/petugas/updateBiodata/{{ $user->nik }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Biodata Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inpnip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="inpnip" value="{{ $user->nip }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="324..." value="{{ $user->nama }}">
            </div>
            <div class="col-md-4">
                <label for="agama" class="form-label">Agama</label>
                <input type="text" name="agama" id="agama" class="form-control" value="{{ $user->agama }}">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="Jenis kelamin">jenis_kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" placeholder="324..." value="{{ $user->jenis_kelamin }}">
            </div>
            <div class="col-md-3">
                <label for="status_perkawinan" class="form-label">status perkawinan</label>
                <input type="text" name="status_perkawinan" id="status_perkawinan" class="form-control" value="{{ $user->status_perkawinan }}">
            </div>
            <div class="col-md-6">
                <label for="inptempat_lahir" class="form-label">tempat lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="inptempat_lahir" value="{{ $user->tempat_lahir }}">
            </div>
            <div class="col-md-5">
                <label for="inptanggal_lahir" class="form-label">tanggal lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" id="inptanggal_lahir" value="{{ $user->tanggal_lahir }}">
            </div>
            <div class="col-md-7">
                <label class="form-label" for="telepon">telepon</label>
                <input type="text" name="telepon" class="form-control" id="telepon" placeholder="324..." value="{{ $user->telepon }}">
            </div>
            <div class="col-md-8">
                <label for="alamat" class="form-label">alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $user->alamat }}">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="photo_pas">photo_pas</label>
                <input type="file" name="photo_pas" class="form-control" id="photo_pas" placeholder="324..." value="{{ $user->photo_pas }}">
            </div>
            <div class="col-md-6">
                <label for="karpeg" class="form-label">Kartu Pegawai</label>
                <input type="text" name="karpeg" id="karpeg" class="form-control" value="{{ $user->karpeg }}">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
@endsection