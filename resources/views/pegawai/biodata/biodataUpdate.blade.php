@extends('pegawai.dashboard')

@section('updateBiodataForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/updateBiodata/{{ $user->nik }}" method="POST" enctype="multipart/form-data">
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
                <label for="agama" class="form-label">agama</label>
                <input type="text" name="agama" id="agama" class="form-control" value="{{ $user->agama }}">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="Jenis kelamin">jenis_kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" placeholder="324..." value="{{ $user->jenis_kelamin }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="tempat_lahir">tempat_lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="324..." value="{{ $user->tempat_lahir }}">
            </div>
            <div class="col-md-4">
                <label for="tanggal_lahir" class="form-label">tanggal_lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ $user->tanggal_lahir }}">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="status_perkawinan">status_perkawinan</label>
                <input type="text" name="status_perkawinan" class="form-control" id="status_perkawinan" placeholder="324..." value="{{ $user->status_perkawinan }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="telepon">telepon</label>
                <input type="text" name="telepon" class="form-control" id="telepon" placeholder="324..." value="{{ $user->telepon }}">
            </div>
            <div class="col-md-4">
                <label for="karpeg" class="form-label">karpeg</label>
                <input type="text" name="karpeg" id="karpeg" class="form-control" value="{{ $user->karpeg }}">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="alamat">alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="324..." value="{{ $user->alamat }}">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="photo_pas">photo_pas</label>
                <input type="file" name="photo_pas" class="form-control" id="photo_pas" placeholder="324..." value="{{ $user->photo_pas }}">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
@endsection