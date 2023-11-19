@extends('pegawai.dashboard')

@section('updatePelatihanForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/updatePelatihan/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Pelatihan Pegawai</h5>
            </div>
            <div class="col-md-12">
                <label for="inpnip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="inpnip" value="{{ $user->nip }}">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="nama_pelatihan">nama_pelatihan</label>
                <input type="text" name="nama_pelatihan" class="form-control" id="nama_pelatihan" value="{{ $user->nama_pelatihan }}">
            </div>
            <div class="col-md-6">
                <label for="jenis_pelatihan" class="form-label">jenis pelatihan :</label>
                <div class="input-group">
                    <select class="form-select" id="jenis_pelatihan_select" name="jenis_pelatihan">
                        <option value="{{ $user->jenis_pelatihan }}">{{ $user->jenis_pelatihan }}</option>
                        <option value="Diklat Kepemimpinan">Diklat Kepemimpinan</option>
                        <option value="Diklat Fungsional">Diklat Fungsional</option>
                        <option value="Diklat Teknis">Diklat Teknis</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <label for="lama_pelatihan" class="form-label">lama_pelatihan</label>
                <input type="text" name="lama_pelatihan" id="lama_pelatihan" class="form-control" value="{{ $user->lama_pelatihan }}">
            </div>
            <div class="col-md-4">
                <label for="waktu_pelatihan" class="form-label">waktu_pelatihan</label>
                <input type="date" name="waktu_pelatihan" id="waktu_pelatihan" class="form-control" value="{{ $user->waktu_pelatihan }}">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="dokumen">dokumen</label>
                <input type="file" name="dokumen" class="form-control" id="dokumen" value="{{ $user->dokumen }}">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
    </div>
@endsection