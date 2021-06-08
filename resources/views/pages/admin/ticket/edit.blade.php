@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header py-3 justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Edit Ticket {{ $item->ticket_name }}</h3>
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
            <form action="{{ route('ticket.update', $item->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="ticket_name">Nama Tiket</label>
                    <input type="text" class="form-control" name="ticket_name" placeholder="Nama Tiket"
                        value="{{ $item->ticket_name }}">
                </div>
                <div class="form-group">
                    <label for="quantity">Jumlah Tiket</label>
                    <input type="number" class="form-control" name="quantity" placeholder="Jumlah Tiket"
                        value="{{ $item->quantity }}">
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" class="form-control" name="price" placeholder="Harga"
                        value="{{ $item->price }}">
                </div>
                <div class="form-group">
                    <label for="expired_ticket">Tanggal Kadaluarsa Tiket</label>
                    <input type="text" class="form-control" name="expired_ticket" placeholder="Tanggal Kadaluarsa Tiket"
                        value="{{ $item->expired_ticket }}">
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" rows="10">{{ $item->description }}</textarea>
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