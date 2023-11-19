@extends('petugas.dashboard')

@section('updatePangkatForm')
    <div class="container shadow pt-2 mt-2" style="width: 800px">
        <form class="row g-3 d-flex" action="/petugas/updatePangkat/{{ $user->nip }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-md-12">
                <h5 for="nama_pendidikan" class="form-h5">Pangkat Pegawai</h5>
            </div>
            <div class="col-md-6">
                <label for="inpNip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="inpNip" value="{{ $user->nip }}">
            </div>
            <div class="col-md-6">
                <label for="inpTMT" class="form-label">TMT</label>
                <input type="date" name="TMT" class="form-control" id="inpTMT" value="{{ $user->TMT }}">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="jabatan">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" id="jabatan" value="{{ $user->jabatan }}">
            </div>
            <div class="col-md-6">
                <label for="pangkat" class="form-label">Pangkat</label>
                <input type="text" name="pangkat" id="pangkat" class="form-control" value="{{ $user->pangkat }}">
            </div>
            <div class="col-md-6">
                <label for="golongan" class="form-label">golongan :</label>
                <div class="input-group">
                    <select class="form-select" id="golongan_select" name="golongan">
                        <option value="{{ $user->golongan }}">{{ $user->golongan }}</option>
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
                        <option value="{{ $user->tingkat }}">{{ $user->tingkat }}</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>
            </div>
            <div class="col-12 pb-4">
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
    </div>
@endsection