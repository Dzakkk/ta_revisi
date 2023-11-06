@extends('pegawai.dashboard')

@section('storePelatihanForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/storePelatihan" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Pelatihan Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inpnip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="inpnip" value="{{ Auth::user()->nip }}">
            </div>
            <div class="col-md-4">
                <label for="pelatihan" class="form-label">pelatihan</label>
                <input type="text" name="pelatihan" id="pelatihan" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="waktu_pelatihan">waktu pelatihan</label>
                <input type="text" name="waktu_pelatihan" class="form-control" id="waktu_pelatihan" placeholder="324...">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="dokumen">dokumen</label>
                <input type="file" name="dokumen" class="form-control" id="dokumen" placeholder="324...">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
@endsection