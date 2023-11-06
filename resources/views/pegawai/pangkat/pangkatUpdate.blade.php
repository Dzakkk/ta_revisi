@extends('pegawai.dashboard')

@section('updatePangkatForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/updatePangkat/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Pangkat Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inpnip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="inpnip" value="{{ $user->nip }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="jabatan">jabatan</label>
                <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="324..." value="{{ $user->jabatan }}">
            </div>
            <div class="col-md-4">
                <label for="pangkat" class="form-label">pangkat</label>
                <input type="text" name="pangkat" id="pangkat" class="form-control" value="{{ $user->pangkat }}">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="golongan">golongan</label>
                <input type="text" name="golongan" class="form-control" id="golongan" placeholder="324..." value="{{ $user->golongan }}">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="tingkat">tingkat</label>
                <input type="text" name="tingkat" class="form-control" id="tingkat" placeholder="324..." value="{{ $user->tingkat }}">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
    </div>
@endsection