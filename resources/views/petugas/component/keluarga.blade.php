@extends('petugas.dashboard')

@section('data_keluarga')
    <?php
    $row = 1;
    ?>
    <table class="table table-hover shadow mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NAMA</th>
                <th scope="col">NIK</th>
                <th scope="col">NAMA PASANGAN</th>
                <th scope="col">TEMPAT LAHIR</th>
                <th scope="col">TANGGAL LAHIR</th>
                <th scope="col"></th>
                <th scope="col"></th>


            </tr>
        </thead>
        <tbody>
            @foreach ($user as $singleUser)
                <tr>

                    <th scope="row">{{ $row }}</th>
                    <td>{{ $singleUser->biodata->nama }}</td>
                    <td>{{ $singleUser->biodata->nik }}</td>
                    <td>{{ $singleUser->biodata->keluarga->nama_pasangan }}</td>
                    <td>{{ $singleUser->tempat_lahir }}</td>
                    <td>{{ $singleUser->tanggal_lahir }}</td>
                    <td>
                        @if (isset($singleUser->dokumen))
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#imageModal-{{ $singleUser->id }}">
                                Dokumen
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="imageModal-{{ $singleUser->id }}" tabindex="-1"
                                aria-labelledby="imageModalLabel-{{ $singleUser->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel-{{ $singleUser->id }}">Dokumen</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('storage/dokumens/' . $singleUser->dokumen) }}"
                                                alt="dokumen" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="/pegawai/updateKeluarga/{{ $singleUser->id }}"
                                class="btn btn-outline-primary btn-sm me-1 mb-1">Ubah</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteModal-{{ $singleUser->id }}">Delete</button>
                        </div>
                    </td>
                    <td>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nama anak</th>
                    <th scope="col">tempat</th>
                    <th scope="col">tanggal lahir</th>
                    <th scope="col">pendidikan</th>
                    <th scope="col">L/P</th>
                    <th scope="col">masuk sekolah</th>
                    <th scope="col"></th>
                    <th scope="col"></th>

                </tr>
                @foreach ($singleUser->biodata->child as $child)
                    <tr>
                        <!-- Display child data here -->
                        <th scope="row"></th>
                        <td>{{ $child->nama_anak }}</td>
                        <td>{{ $child->tempat_lahir }}</td>
                        <td>{{ $child->tanggal_lahir }}</td>
                        <td>{{ $child->pendidikan }}</td>
                        <td>{{ $child->jenis_kelamin }}</td>
                        <td>{{ $child->waktu_masuk }}</td>
                        <th scope="row"></th>

                    </tr>
                @endforeach
                </td>
                </tr>
                <?php
                $row++;
                ?>

                <!-- Add a separator or header for the children data -->
            @endforeach
        </tbody>
    </table>
@endsection
