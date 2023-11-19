@extends('pegawai.dashboard')


@section('data_keluarga')
<?php
$row = 1;
?>
<a href="/pegawai/storeChild" class="btn btn-primary rounded">Tambah anak</a>
<table class="table table-hover shadow mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">NIK</th>
            <th scope="col">NAMA PASANGAN</th>
            <th scope="col">TEMPAT LAHIR</th>
            <th scope="col">TANGGAL LAHIR</th>
            <th scope="col">DOKUMEN</th>
            <th scope="col">#</th>

        </tr>
    </thead>
    <tbody>
        {{-- @foreach ($user as $user) --}}
            <tr>
                <th scope="row">{{ $row }}</th>
                <td>{{ $user->biodata->nik }}</td>
                <td>{{ $user->biodata->keluarga->nama_pasangan }}</td>
                <td>{{ $user->tempat_lahir }}</td>
                <td>{{ $user->tanggal_lahir }}</td>
                <td>
                    @if (isset($user->dokumen))
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal-{{ $user->id }}">
                            Lihat Dokumen
                        </button>
                
                        <!-- Modal -->
                        <div class="modal fade" id="imageModal-{{ $user->id }}" tabindex="-1" aria-labelledby="imageModalLabel-{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imageModalLabel-{{ $user->id }}">Dokumen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('storage/dokumens/' . $user->dokumen) }}" alt="dokumen" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </td>               
                    <td>
                    <div class="">
                        <a href="/pegawai/updateKeluarga/{{ $user->id }}" class="btn btn-outline-primary btn-sm me-1 mb-1">Ubah</a>
                        {{-- <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal-{{ $user->id }}">Delete</button> --}}
                    </div>
                </td>
            </tr>
           
            {{-- <div class="modal fade" id="confirmDeleteModal-{{ $user->id }}" tabindex="-1"
                aria-labelledby="confirmDeleteModalLabel-{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel-{{ $user->id }}">Confirm Deletion
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this record?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                            <form action="{{ route('biodata.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Confirm Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div> --}}
        {{-- @endforeach --}}
    </tbody>
</table>

<table class="table table-hover shadow mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">NIK</th>
            <th scope="col">NAMA ANAK</th>
            <th scope="col">TEMPAT LAHIR</th>
            <th scope="col">TANGGAL LAHIR</th>
            <th scope="col">JENIS KELAMIN</th>
            <th scope="col">PENDIDIKAN</th>
            <th scope="col">WAKTU MASUK</th>
            <th scope="col">#</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($child as $item)
            <tr>
                <th scope="row">{{ $row }}</th>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->nama_anak }}</td>
                <td>{{ $item->tempat_lahir }}</td>
                <td>{{ $item->tanggal_lahir }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->pendidikan }}</td>
                <td>{{ $item->waktu_masuk }}</td>   
                    <td>
                    <div class="">
                        <a href="/pegawai/updateChild/{{ $item->id }}" class="btn btn-outline-primary btn-sm me-1 mb-1">Ubah</a>
                        {{-- <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal-{{ $user->id }}">Delete</button> --}}
                    </div>
                </td>
            </tr>
            <?php
            $row++;
            ?>
            {{-- <div class="modal fade" id="confirmDeleteModal-{{ $user->id }}" tabindex="-1"
                aria-labelledby="confirmDeleteModalLabel-{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel-{{ $user->id }}">Confirm Deletion
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this record?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                            <form action="{{ route('biodata.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Confirm Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div> --}}
        @endforeach
    </tbody>
</table>
@endsection




