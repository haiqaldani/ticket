@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 justify-content-between">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary text-2xl">Pengguna</h3>
                    {{-- <a href="{{ route('user.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                          <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pengguna
                      </a> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table_user" class="table" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pengguna</th>
                                <th>Email</th>
                                <th>Nomor Telepon</th>
                                <th>Verifikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse($items as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->number_phone }}</td>
                                    <td>
                                        @if ($item->verification_id == null)
                                            User Belum Mengisi Data
                                        @elseif($item->status == 2)
                                            User Sudah di Verifikasi
                                        @else
                                            User Sedang di Verifikasi
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->id != Auth::user()->id)
                                            @if ($item->verification_id != null)
                                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info">
                                                    <i class="fa fa-plus"></i> Verifikasi Data
                                                </a>
                                            @endif
                                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('user.destroy', $item->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <td colspan="7" class="text-center">
                                    Data Kosong
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#table_cartype').DataTable(

        );
    });

</script>
@endsection
