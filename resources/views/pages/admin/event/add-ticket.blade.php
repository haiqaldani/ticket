@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header py-3 justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Ticket Event {{ $item->title }}</h3>
        </div>

        <div class="card-body">
            <!-- Content Row -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('ticket.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="event_id" placeholder="Id Event"
                        value="{{ $item->id }}">

                <div class="form-group">
                    <label for="ticket_name">Nama Tiket</label>
                    <input type="text" class="form-control" name="ticket_name" placeholder="Nama Tiket"
                        value="{{ old('ticket_name') }}">
                </div>
                <div class="form-group">
                    <label for="quantity">Jumlah Tiket</label>
                    <input type="number" class="form-control" name="quantity" placeholder="Jumlah Tiket"
                        value="{{ old('quantity') }}">
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" class="form-control" name="price" placeholder="Harga"
                        value="{{ old('price') }}">
                </div>
                <div class="form-group">
                    <label for="expired_ticket">Tanggal Kadaluarsa Tiket</label>
                    <input type="text" class="form-control" name="expired_ticket" placeholder="Tanggal Kadaluarsa Tiket"
                        value="{{ old('expired_ticket') }}">
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" rows="10">{{ old('description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
@section('script')
    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('term_and_condition');

    </script>
@endsection