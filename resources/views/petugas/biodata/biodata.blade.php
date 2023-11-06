@extends('petugas.dashboard')


@section('data_biodata')
<?php
$row = 1;
?>
<table class="table table-hover shadow mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">NIK</th>
            <th scope="col">NAMA</th>
            <th scope="col">NIP</th>
            <th scope="col">agama</th>
            <th scope="col">jenis_kelamin</th>
            <th scope="col">status_perkawinan</th>
            <th scope="col">tempat_lahir</th>
            <th scope="col">tanggal_lahir</th>
            <th scope="col">telepon</th>
            <th scope="col">alamat</th>
            <th scope="col">photo_pas</th>
            <th scope="col">karpeg</th>
            <th scope="col">#</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
            <tr>
                <th scope="row">{{ $row }}</th>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->agama }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->status_perkawinan }}</td>
                <td>{{ $item->tempat_lahir }}</td>
                <td>{{ $item->tanggal_lahir }}</td>
                <td>{{ $item->telepon }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->karpeg }}</td>
                <td><img src="{{ asset('storage/' . $item->photo_pas) }}" alt="photo"></td>
                <td>
                    <div class="">
                        <a href="/petugas/updateBiodata/{{ $item->nik }}" class="btn btn-outline-primary btn-sm me-1 mb-1">Ubah</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal-{{ $item->nik }}">Delete</button>
                    </div>
                </td>
            </tr>
            <?php
            $row++;
            ?>
            <div class="modal fade" id="confirmDeleteModal-{{ $item->nik }}" tabindex="-1"
                aria-labelledby="confirmDeleteModalLabel-{{ $item->nik }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel-{{ $item->nik }}">Confirm Deletion
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this record?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                            <form action="{{ route('biodata.delete', $item->nik) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Confirm Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </tbody>
</table>
@endsection




