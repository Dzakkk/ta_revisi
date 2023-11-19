@extends('pegawai.dashboard')

@section('storeBiodataForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/storeBiodata" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Biodata Pegawai</h5>
            </div>
            <div class="col-md-8">
                <label class="form-label" for="nik">nik</label>
                <input type="text" name="nik" class="form-control" id="nik" placeholder="324...">
            </div>
            <div class="col-md-6">
                <label for="inpnip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="inpnip" value="{{ Auth::user()->nip }}">
            </div>
            <div class="col-md-8">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ Auth::user()->nama }}">
            </div>
            <div class="col-md-8">
                <label for="agama" class="form-label">Agama :</label>
                <div class="input-group">
                    <select class="form-select" id="agama_select" name="agama">
                        <option value="">Pilih Agama</option>
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
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="324...">
            </div>
            <div class="col-md-6">
                <label for="tanggal_lahir" class="form-label">tanggal_lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="status_perkawinan" class="form-label">status_perkawinan :</label>
                <div class="input-group">
                    <select class="form-select" id="status_perkawinan_select" name="status_perkawinan">
                        <option value="">Status</option>
                        <option value="Menikah">Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Janda">Janda</option>
                        <option value="Duda">Duda</option>
                    </select>
                </div>
            </div>         
            <div class="col-md-6">
                <label class="form-label" for="telepon">telepon</label>
                <input type="text" name="telepon" class="form-control" id="telepon" placeholder="324...">
            </div>
            <div class="col-md-6">
                <label for="karpeg" class="form-label">karpeg</label>
                <input type="text" name="karpeg" id="karpeg" class="form-control">
            </div>   
            <div class="col-md-6">
                <label class="form-label" for="photo_pas">photo_pas</label>
                <input type="file" name="photo_pas" class="form-control" id="photo_pas" placeholder="324...">
            </div>
            <div class="col-md-12">
                <label class="form-label" for="alamat">alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="324...">
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
@endsection