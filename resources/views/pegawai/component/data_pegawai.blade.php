@extends('pegawai.dashboard')


@section('data_pegawai')
<?php
$row = 1;
?>
<table class="table table-hover shadow mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">NAMA</th>
            <th scope="col">NIP</th>
            <th scope="col">TAHUN PENGANGKATAN</th>
            <th scope="col">TAHUN PENSIUN</th>
            <th scope="col">#</th>
        </tr>
    </thead>
    <tbody>
        {{-- @foreach ($user as $user) --}}
            <tr>
                <th scope="row">{{ $row }}</th>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->nip }}</td>
                <td>{{ $user->birthDate1 }}</td>
                <td>{{ $user->turns60Date  }}</td>
                <td>
                    <div class="d-flex">
                        <a href="/petugas/updateUser/{{ $user->nip }}" class="btn btn-outline-primary btn-sm me-1">Ubah</a>
                        
                    </div>
                </td>
            </tr>
            <?php
            $row++;
            ?>
        {{-- @endforeach --}}
    </tbody>
</table>
@endsection




