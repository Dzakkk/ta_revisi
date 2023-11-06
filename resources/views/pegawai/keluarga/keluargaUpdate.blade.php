@extends('pegawai.dashboard')

@section('updateKeluargaForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/updateKeluarga/{{ $user->nik }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Keluarga Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inpnip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="inpnip" value="{{ $user->nip }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="nama_pasangan">nama_pasangan</label>
                <input type="text" name="nama_pasangan" class="form-control" id="nama_pasangan" placeholder="324..." value="{{ $user->nama_pasangan }}">
            </div>
            <div class="col-md-4">
                <label for="jumlah_anak" class="form-label">jumlah_anak</label>
                <input type="text" name="jumlah_anak" id="jumlah_anak" class="form-control" value="{{ $user->jumlah_anak }}">
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