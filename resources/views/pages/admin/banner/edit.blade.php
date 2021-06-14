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
            <form action="{{ route('banner.update', $item->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="event_blog_id">Id Banner</label>
                    <input type="text" class="form-control" name="event_blog_id" placeholder="Id Banner"
                        value="{{ $item->event_blog_id }}">
                </div>
                <div class="form-group">
                    <label for="category">Kategori</label>
                    <select name="category" class="form-control">
                        <option value="{{ $item->category }}">Pilih untuk diganti</option>
                        <option value="event">Event</option>
                        <option value="blog">Blog</option>
                    </select>
                </div>
                <div class="form-group">
                    <img src="{{ Storage::url($item->image) }}">
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