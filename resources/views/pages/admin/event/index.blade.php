@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 justify-content-between">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary text-2xl">Event</h3>
                      <a href="{{ route('event.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                          <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Event
                      </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table_event" class="table" width="100%">
                        <thead>
                            <tr>
                          <th>ID</th>
                          <th>Nama Event</th>
                          <th>Kategori</th>
                          <th>Jenis Event</th>
                          <th>Kota</th>
                          <th>Verifikasi</th>
                          <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                        @php $no = 1; @endphp
                      @forelse($items as $item)
                          <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $item->title }}</td>
                              <td>{{ $item->category_event }}</td>
                              <td>{{ $item->event_type }}</td>
                              <td>{{ $item->city }}</td>
                              <td>
                                  @if ($item->status == 1)
                                      Belum di Verifikasi
                                  @else
                                    Sudah 
                                  @endif
                              </td>
                              <td>
                                  <a href="{{ route('add-ticket', $item->id) }}" class="btn btn-info">
                                      <i class="fa fa-plus"></i> Tambah Tiket
                                  </a>
                                  <a href="{{ route('event.edit', $item->id) }}" class="btn btn-info">
                                      <i class="fa fa-pencil-alt"></i>
                                  </a>
                                  <form action="{{ route('event.destroy', $item->id) }}" method="post" class="d-inline">
                                      @csrf
                                      @method('delete')
                                      <button class="btn btn-danger">
                                          <i class="fa fa-trash"></i>
                                      </button>
                                  </form>

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
