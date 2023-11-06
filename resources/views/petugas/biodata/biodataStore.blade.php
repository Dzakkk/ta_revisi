@extends('petugas.dashboard')

@section('storeBiodataForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/petugas/storeBiodata" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Biodata Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inpNik" class="form-label">NIK</label>
                <input type="text" name="nik" class="form-control" id="inpNik">
            </div>
            <div class="col-md-6">
                <label for="inpnip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="inpnip">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="324...">
            </div>
            <div class="col-md-4">
                <label for="agama" class="form-label">Agama</label>
                <input type="text" name="agama" id="agama" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="Jenis kelamin">jenis_kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" placeholder="324...">
            </div>
            <div class="col-md-3">
                <label for="status_perkawinan" class="form-label">status perkawinan</label>
                <input type="text" name="status_perkawinan" id="status_perkawinan" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="inptempat_lahir" class="form-label">tempat lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="inptempat_lahir">
            </div>
            <div class="col-md-5">
                <label for="inptanggal_lahir" class="form-label">tanggal lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" id="inptanggal_lahir">
            </div>
            <div class="col-md-7">
                <label class="form-label" for="telepon">telepon</label>
                <input type="text" name="telepon" class="form-control" id="telepon" placeholder="324...">
            </div>
            <div class="col-md-8">
                <label for="alamat" class="form-label">alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="photo_pas">photo_pas</label>
                <input type="file" name="photo_pas" class="form-control" id="photo_pas" placeholder="324...">
            </div>
            <div class="col-md-6">
                <label for="karpeg" class="form-label">Kartu Pegawai</label>
                <input type="text" name="karpeg" id="karpeg" class="form-control">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
@endsection