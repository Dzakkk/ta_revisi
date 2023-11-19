@extends('pegawai.dashboard')

@section('storeCutiForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/storeCuti" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Cuti Pegawai</h5>
            </div>
            <div class="col-md-5">
                <label for="inpnip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="inpnip" value="{{ Auth::user()->nip }}">
            </div>
            <div class="col-md-7">
                <label for="nama" class="form-label">nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ Auth::user()->nama }}">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="TMT_cuti">waktu cuti</label>
                <input type="date" name="TMT_cuti" class="form-control" id="TMT_cuti" placeholder="324...">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="selesai">waktu selesai</label>
                <input type="date" name="selesai" class="form-control" id="selesai" placeholder="324...">
            </div>
            <div class="col-md-4">
                <label for="keterangan" class="form-label">keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control">
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