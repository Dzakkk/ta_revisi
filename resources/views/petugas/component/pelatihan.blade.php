@extends('petugas.dashboard')


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
        @foreach ($user as $u)
            <tr>
                <th scope="row">{{ $row }}</th>
                <td>{{ $u->nip }}</td>
                <td>{{ $u->pelatihan }}</td>
                <td>{{ $u->waktu_pelatihan }}</td>
                <td>@if (isset($u->dokumen))
                    <div class="">
                        <img src="{{ asset('storage/dokumens/' . $u->dokumen) }}" alt="dokumen Buku"/>
                    </div>
                    @endif</td>
                <td>
                    <div class="">
                        <a href="/petugas/updatePelatihan/{{ $u->id }}" class="btn btn-outline-primary btn-sm me-1 mb-1">Ubah</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal-{{ $u->id }}">Delete</button>
                    </div>
                </td>
            </tr>
            <?php
            $row++;
            ?>
            <div class="modal fade" id="confirmDeleteModal-{{ $u->id }}" tabindex="-1"
                aria-labelledby="confirmDeleteModalLabel-{{ $u->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel-{{ $u->id }}">Confirm Deletion
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this record?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                            <form action="{{ route('biodata.delete', $u->id) }}" method="POST">
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




