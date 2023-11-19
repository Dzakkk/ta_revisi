@extends('pegawai.dashboard')

@section('updateBiodataForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/updateBiodata/{{ $user->nik }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Biodata Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inpnip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="inpnip" value="{{ $user->nip }}">
            </div>
            <div class="col-md-6">
                <label for="inpnik" class="form-label">NIK</label>
                <input type="text" name="nik" class="form-control" id="inpnik" value="{{ $user->nik }}">
            </div>
            <div class="col-md-12">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="324..." value="{{ $user->nama }}">
            </div>
            <div class="col-md-8">
                <label for="agama" class="form-label">Agama :</label>
                <div class="input-group">
                    <select class="form-select" id="agama_select" name="agama">
                        <option value="{{ $user->agama }}">{{ $user->agama }}</option>
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
            </div> 
            <div class="col-md-4">
                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                <div class="d-flex">
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L">
                        <label class="form-check-label" for="jenis_kelamin">
                            Laki Laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P">
                        <label class="form-check-label" for="jenis_kelamin">
                            Perempuan
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="tempat_lahir">tempat_lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="324..." value="{{ $user->tempat_lahir }}">
            </div>
            <div class="col-md-6">
                <label for="tanggal_lahir" class="form-label">tanggal_lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ $user->tanggal_lahir }}">
            </div>
            <div class="col-md-6">
                <label for="status_perkawinan" class="form-label">Status Pernikahan:</label>
                <div class="input-group">
                    <select class="form-select" id="status_perkawinan_select" name="status_perkawinan">
                        <option value="{{ $user->status_perkawinan }}">{{ $user->status_perkawinan }}</option>
                        <option value="Menikah">Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Janda">Janda</option>
                        <option value="Duda">Duda</option>
                    </select>
                </div>
            </div> 
            <div class="col-md-6">
                <label class="form-label" for="telepon">telepon</label>
                <input type="text" name="telepon" class="form-control" id="telepon" placeholder="324..." value="{{ $user->telepon }}">
            </div>
            <div class="col-md-6">
                <label for="karpeg" class="form-label">karpeg</label>
                <input type="text" name="karpeg" id="karpeg" class="form-control" value="{{ $user->karpeg }}">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="photo_pas">photo_pas</label>
                <input type="file" name="photo_pas" class="form-control" id="photo_pas" placeholder="324..." value="{{ $user->photo_pas }}">
            </div>
            <div class="col-md-12">
                <label class="form-label" for="alamat">alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="324..." value="{{ $user->alamat }}">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Edit Data</button>
            </div>
        </form>
    </div>
@endsection