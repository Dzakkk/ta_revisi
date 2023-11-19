@extends('pegawai.dashboard')

@section('storeChildForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/storeChild" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Keluarga Pegawai</h5>
            </div>
            <div class="col-md-12">
                <label for="inpnip" class="form-label">NIK Pegawai</label>
                <input type="text" name="nik" class="form-control" id="inpnip"
                    value="{{ Auth::user()->biodata->nik }}">
            </div>
            <div class="col-md-12">
                <label class="form-label" for="nama_anak">nama Anak</label>
                <input type="text" name="nama_anak" class="form-control" id="nama_anak">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                <div class="d-flex">
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L">
                        <label class="form-check-label" for="jenis_kelamin">
                            Laki Laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P">
                        <label class="form-check-label" for="jenis_kelamin">
                            Perempuan
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <label class="form-label" for="tempat_lahir">tempat lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
            </div>
            <div class="col-md-4">
                <label for="tanggal_lahir" class="form-label">tanggal lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="pendidikan">Pendidikan</label>
                <input type="text" name="pendidikan" class="form-control" id="pendidikan">
            </div>
            <div class="col-md-4">
                <label for="waktu_masuk" class="form-label">Waktu masuk</label>
                <input type="date" name="waktu_masuk" id="waktu_masuk" class="form-control">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
@endsection
