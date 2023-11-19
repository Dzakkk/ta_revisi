@extends('petugas.dashboard')

@section('data_pendidikan')
    <?php $row = 1; ?>
    <form action="/pendidikan/filter" method="get" class="mb-3">
        <div class="input-group">
            <label for="jurusan" class="input-group-text">Gelar:</label>
            <select class="form-select" id="jurusan" name="gelar">
                <option value="">Pilih Gelar</option>
                <option value="Sarjana">Sarjana</option>
                <option value="Magister">Magister</option>
                <option value="Dokter">Dokter</option>
            </select>
            <button type="submit" class="btn btn-outline-primary">Cari</button>
            <a href="/petugas/dashboard/pendidikan" type="button" class="btn btn-outline-primary">Reset</a>
        </div>
    </form>
    <table class="table table-hover shadow mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NAMA</th>
                <th scope="col">NAMA PENDIDIKAN</th>
                <th scope="col">GELAR</th>
                <th scope="col">PROGRAM STUDI</th>
                <th scope="col">TAHUN LULUS</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
                <tr>
                    <th scope="row">{{ $row }}</th>
                    <td>{{ $item->pegawai->nama }}</td>
                    <td>{{ $item->nama_pendidikan }}</td>
                    <td>{{ $item->gelar }}</td>
                    <td>{{ $item->program }}</td>
                    <td>{{ $item->tahun_lulus }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="/petugas/updatePendidikan/{{ $item->nik }}" class="btn btn-outline-primary btn-sm me-1">Ubah</a>
                        </div>
                    </td>
                </tr>
                <?php $row++; ?>
            @endforeach
        </tbody>
    </table>
@endsection
