@extends('petugas.dashboard')

@section('updatePendidikanForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/petugas/updatePendidikan/{{ $user->nip }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Pangkat Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inpnik" class="form-label">nip</label>
                <input type="text" name="nip" class="form-control" id="inpnip" value="{{ $user->nip }}">
            </div>
            <div class="col-md-4">
                <label for="inptanggal_lulus" class="form-label">tanggal_lulus</label>
                <input type="date" name="tahun_lulus" class="form-control" id="inptanggal_lulus" value="{{ $user->tahun_lulus }}">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="gelar">gelar</label>
                <input type="text" name="gelar" class="form-control" id="gelar" value="{{ $user->gelar }}">
            </div>
            <div class="col-md-6">
                <label for="program" class="form-label">program</label>
                <input type="text" name="program" id="program" class="form-control" value="{{ $user->program }}">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
    </div>
@endsection