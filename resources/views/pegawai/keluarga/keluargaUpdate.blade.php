@extends('pegawai.dashboard')

@section('updateKeluargaForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/updateKeluarga/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Keluarga Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inpnip" class="form-label">NIK</label>
                <input type="text" name="nik" class="form-control" id="inpnik" value="{{ $user->nik }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="nama_pasangan">nama_pasangan</label>
                <input type="text" name="nama_pasangan" class="form-control" id="nama_pasangan" placeholder="324..." value="{{ $user->nama_pasangan }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="tempat_lahir">tempat lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{ $user->tempat_lahir }}">
            </div>
            <div class="col-md-4">
                <label for="tanggal_lahir" class="form-label">tanggal lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ $user->tanggal_lahir  }}">
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