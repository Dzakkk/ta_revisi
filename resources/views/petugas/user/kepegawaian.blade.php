@extends('petugas.dashboard')


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
            <th scope="col">TAHUN PENSIUN</th>
            <th scope="col">TAHUN PENGANGKATAN</th>
            <th scope="col">#</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
            <tr>
                <th scope="row">{{ $row }}</th>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nip }}</td>
                <th>{{ $item->turns60Date }}</th>
                <th>{{ $item->birthDate1 }}</th>

                <td>
                    <div class="d-flex">
                        <a href="/petugas/updateUser/{{ $item->nip }}" class="btn btn-outline-primary btn-sm me-1">Ubah</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal-{{ $item->nip }}">Delete</button>
                    </div>
                </td>
            </tr>
            <?php
            $row++;
            ?>
            <div class="modal fade" id="confirmDeleteModal-{{ $item->nip }}" tabindex="-1"
                aria-labelledby="confirmDeleteModalLabel-{{ $item->nip }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel-{{ $item->nip }}">Confirm Deletion
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this record?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                            <form action="{{ route('pegawai.delete', $item->nip) }}" method="POST">
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




