@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header py-3 justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Edit Banner</h3>
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
            <form action="{{ route('user.update', $item->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="d-flex justify-content-center">
                    <img src="{{ Storage::url($item->verification_data->id_card_photo) }}" alt="">
                </div>
                <div class="form-row mt-4">
                    <div class="form-group col-md-6">
                        <label for="">Nomor KTP</label>
                        <input type="text" class="form-control"
                            value="{{ $item->verification_data->id_card }}" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Nama di KTP</label>
                        <input type="text" class="form-control"
                        value="{{ $item->verification_data->name }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Alamat di KTP</label>
                        <input type="text" class="form-control"
                        value="{{ $item->verification_data->address }}" disabled>
                </div>
                <div class="form-group">
                    <label for="">Status Verifikasi User</label>
                    <select name="status" class="form-control">
                        <option value="1">Ditolak</option>
                        <option value="2">Diterima</option>
                        
                    </select>
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