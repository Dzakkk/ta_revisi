@extends('pegawai.dashboard')


@section('data_pelatihan')
<?php
$row = 1;
?>
<table class="table table-hover shadow mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">NIP</th>
            <th scope="col">pelatihan</th>
            <th scope="col">waktu_pelatihan</th>
            <th scope="col">dokumen</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
            <tr>
                <th scope="row">{{ $row }}</th>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->pelatihan }}</td>
                <td>{{ $item->waktu_pelatihan }}</td>
                <td>{{ $item->dokumen }}</td>
                <td>
                    <div class="">
                        <a href="/petugas/updatePelatihan/{{ $item->id }}" class="btn btn-outline-primary btn-sm me-1 mb-1">Ubah</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal-{{ $item->id }}">Delete</button>
                    </div>
                </td>
            </tr>
            <?php
            $row++;
            ?>
            <div class="modal fade" id="confirmDeleteModal-{{ $item->id }}" tabindex="-1"
                aria-labelledby="confirmDeleteModalLabel-{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel-{{ $item->id }}">Confirm Deletion
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this record?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                            <form action="{{ route('biodata.delete', $item->id) }}" method="POST">
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




