@extends('kepala_sekolah.dashboard')


@section('data_pangkat')
<?php
$row = 1;
?>
<table class="table table-hover shadow mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">NAMA</th>
            <th scope="col">NIP</th>
            <th scope="col">TMT</th>
            <th scope="col">JABATAN</th>
            <th scope="col">PANGKAT</th>
            <th scope="col">GOLONGAN</th>
            <th scope="col">TINGKAT</th>
            <th scope="col">#</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
            <tr>
                <th scope="row">{{ $row }}</th>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->TMT }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->pangkat }}</td>
                <td>{{ $item->golongan }}</td>
                <td>{{ $item->tingkat }}</td>
                <td>
                    <div class="d-flex">
                        <a href="/petugas/updatePangkat/{{ $item->nip }}" class="btn btn-outline-primary btn-sm me-1">Ubah</a>
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




