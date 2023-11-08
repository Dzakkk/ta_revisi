@extends('kepala_sekolah.dashboard')


@section('data_keluarga')
<?php
$row = 1;
?>
<table class="table table-hover shadow mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">waktu</th>
            <th scope="col">keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
            <tr>
                <th scope="row">{{ $row }}</th>
                <td>{{ $item->waktu }}</td>
                <td>{{ $item->keterangan }}</td>              
            </tr>
            <?php
            $row++;
            ?>
        @endforeach
    </tbody>
</table>
@endsection




