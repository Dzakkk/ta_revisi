@extends('petugas.dashboard')

@section('storeUserForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/petugas/storeUser" method="POST">
            @csrf
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Biodata Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword4">
            </div>
            <div class="col-md-12">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Udin syamsudin">
            </div>
            <div class="col-md-4">
                <label for="inputRole" class="form-label">User</label>
                <input type="text" name="role" class="form-control" id="inputRole" value="pegawai">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="nip">NIP</label>
                <input type="text" name="nip" class="form-control" id="nip" placeholder="324...">
            </div>
            
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
@endsection