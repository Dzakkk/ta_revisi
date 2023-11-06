@extends('pegawai.dashboard')

@section('storeBiodataForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/storeBiodata" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Biodata Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inpnip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="inpnip" value="{{ Auth::user()->nip }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="nama">Nama Pasangan</label>
                <input type="text" name="nama_pasangan" class="form-control" id="nama" placeholder="324...">
            </div>
            <div class="col-md-4">
                <label for="agama" class="form-label">Jumlah Anak</label>
                <input type="text" name="jumlah_anak" id="agama" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="Jenis kelamin">Dokumen</label>
                <input type="file" name="dokumen" class="form-control" id="Dokumen" placeholder="324...">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
@endsection