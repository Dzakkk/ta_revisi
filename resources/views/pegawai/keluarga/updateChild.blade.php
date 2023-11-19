@extends('pegawai.dashboard')

@section('updateChildForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/updateChild/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Child Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inpnip" class="form-label">nik</label>
                <input type="text" name="nik" class="form-control" id="inpnik" value="{{ $user->nik }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="nama_anak">nama_anak</label>
                <input type="text" name="nama_anak" class="form-control" id="nama_anak" value="{{ $user->nama_anak }}">
            </div>
            <div class="col-md-4">
                <label for="tanggal_lahir" class="form-label">tanggal lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ $user->tanggal_lahir  }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="jenis_kelamin">jenis_kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" value="{{ $user->jenis_kelamin }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="tempat_lahir">tempat lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{ $user->tempat_lahir }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="pendidikan">pendidikan</label>
                <input type="text" name="pendidikan" class="form-control" id="pendidikan" value="{{ $user->pendidikan }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="waktu_masuk">waktu masuk</label>
                <input type="date" name="waktu_masuk" class="form-control" id="waktu_masuk" value="{{ $user->waktu_masuk }}">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
    </div>
@endsection