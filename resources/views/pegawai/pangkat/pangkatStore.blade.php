@extends('pegawai.dashboard')

@section('storePangkatForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/pegawai/storePangkat" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Pangkat Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inpnip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="inpnip" value="{{ Auth::user()->nip }}">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="TMT">Tertanda Mulai Tanggal</label>
                <input type="date" name="TMT" class="form-control" id="TMT" placeholder="324...">
            </div>
            <div class="col-md-6">
                <label for="jabatan" class="form-label">jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="pangkat">pangkat</label>
                <input type="text" name="pangkat" class="form-control" id="pangkat">
            </div>
            <div class="col-md-6">
                <label for="golongan" class="form-label">golongan :</label>
                <div class="input-group">
                    <select class="form-select" id="golongan_select" name="golongan">
                        <option value="">Pilih golongan</option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                    </select>
                </div>
            </div> 
            <div class="col-md-6">
                <label for="tingkat" class="form-label">Tingkat :</label>
                <div class="input-group">
                    <select class="form-select" id="tingkat_select" name="tingkat">
                        <option value="">Pilih tingkat</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>
            </div> 
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
@endsection