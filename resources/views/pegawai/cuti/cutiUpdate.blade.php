@extends('pegawai.dashboard')

@section('updateCutiForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/updateCuti/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Cuti Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inpnip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="inpnip" value="{{ $user->nip }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="nama">nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="324..." value="{{ $user->nama }}">
            </div>
            <div class="col-md-4">
                <label for="TMT_cuti" class="form-label">TMT_cuti</label>
                <input type="text" name="TMT_cuti" id="TMT_cuti" class="form-control" value="{{ $user->TMT_cuti }}">
            </div>
            <div class="col-md-4">
                <label for="selesai" class="form-label">selesai</label>
                <input type="text" name="selesai" id="selesai" class="form-control" value="{{ $user->selesai }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="keterangan">keterangan</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="324..." value="{{ $user->keterangan }}">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="dokumen">dokumen</label>
                <input type="file" name="dokumen" class="form-control" id="dokumen" placeholder="324..." value="{{ $user->dokumen }}">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
    </div>
@endsection