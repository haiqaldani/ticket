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
            <form action="{{ route('banner.update') }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-row ">
                    <div class="form-group col-md-6">
                        <label for="event_id">Id Event</label>
                        <input type="text" class="form-control" name="event_id" placeholder="Id Event"
                            value="{{ $item->event_id }}" @if($item->event_id == null) disabled @endif>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="banner_id">Id Banner</label>
                        <input type="text" class="form-control" name="banner_id" placeholder="Id Banner"
                            value="{{ $item->banner_id }}" @if($item->banner_id == null) disabled @endif>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Gambar Banner</label>
                    {{-- <input type="file" class="form-control" name="image" placeholder="Image"> --}}
                    <div class="file-upload ">
                        <div class="file-select">
                            <div class="file-select-button" id="fileName">Pilih Gambar</div>
                            <div class="file-select-name" id="noFile">Tidak ada gambar terpilih</div>
                            <input type="file" name="image" accept="image/*" id="chooseFile">
                        </div>
                    </div>
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