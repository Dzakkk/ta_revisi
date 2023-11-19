@extends('petugas.dashboard')

@section('data_cuti')
    <?php $row = 1; ?>
    <table class="table table-hover shadow mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIP</th>
                <th scope="col">TMT_cuti</th>
                <th scope="col">nama</th>
                <th scope="col">selesai</th>
                <th scope="col">Status</th>
                <th scope="col">keterangan</th>
                <th scope="col">Actions</th>
                <th scope="col">Dokumen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $u)
                <tr>
                    <th scope="row">{{ $row }}</th>
                    <td>{{ $u->nip }}</td>
                    <td>{{ $u->TMT_cuti }}</td>
                    <td>{{ $u->nama }}</td>
                    <td>{{ $u->selesai }}</td>
                    <td>{{ $u->status }}</td>
                    <td>{{ $u->keterangan }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Actions">
                            <form id="updateStatusForm-{{ $u->id }}"
                                action="{{ route('cuti.updateStatus', $u->id) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <input type="hidden" name="newStatus"
                                    value="{{ $u->status == 'Disetujui' ? 'Ditolak' : 'Disetujui' }}">
                            </form>
                            <button type="button"
                                class="btn btn-{{ $u->status == 'Disetujui' ? 'danger' : 'success' }} btn-sm"
                                onclick="confirmStatusUpdate({{ $u->id }})">
                                {{ $u->status == 'Disetujui' ? 'Tolak' : 'Setuju' }}
                            </button>
                        </div>
                    </td>
                    <td>
                        @if (isset($u->dokumen))
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#imageModal-{{ $u->id }}">
                                Dokumen
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="imageModal-{{ $u->id }}" tabindex="-1"
                                aria-labelledby="imageModalLabel-{{ $u->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel-{{ $u->id }}">Dokumen</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('storage/dokumens/' . $u->dokumen) }}" alt="dokumen"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
                <?php $row++; ?>
            @endforeach
        </tbody>
    </table>

    <script>
        function confirmStatusUpdate(id) {
            if (confirm('Are you sure you want to update the status?')) {
                document.getElementById('updateStatusForm-' + id).submit();
            }
        }
    </script>
@endsection
