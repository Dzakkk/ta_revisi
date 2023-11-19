@extends('pegawai.dashboard')

@section('updatePendidikanForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/updatePendidikan/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Pendidikan Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inpnip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="inpnip" value="{{ $user->nip }}">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="tahun_lulus">Tahun Lulus</label>
                <input type="date" name="tahun_lulus" class="form-control" id="tahun_lulus" value="{{ $user->tahun_lulus }}">
            </div>
            <div class="col-md-6">
                <label for="gelar" class="form-label">Gelar :</label>
                <div class="input-group">
                    <select class="form-select" id="gelar_select" name="gelar">
                        <option value="{{ $user->gelar }}">{{ $user->gelar }}</option>
                        <option value="Sarjana">Sarjana</option>
                        <option value="Magister">Magister</option>
                        <option value="Dokter">Dokter</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="program">program</label>
                <input type="text" name="program" class="form-control" id="program" value="{{ $user->program }}">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="nama_pendidikan">nama_pendidikan</label>
                <input type="text" name="nama_pendidikan" class="form-control" id="nama_pendidikan" value="{{ $user->nama_pendidikan }}">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
    </div>
@endsection