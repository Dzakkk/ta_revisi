@extends('petugas.dashboard')


@section('data_pendidikan')
<?php
$row = 1;
?>
<table class="table table-hover shadow mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
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
            <?php
            $row++;
            ?>
        @endforeach
    </tbody>
</table>
@endsection




