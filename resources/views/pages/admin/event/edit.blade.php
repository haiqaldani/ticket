@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header py-3 justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Edit Event {{ $item->title }}</h3>
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
            <form action="{{ route('event.update', $item->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Judul Event</label>
                    <input type="text" class="form-control" name="title" placeholder="Judul Event"
                        value="{{ $item->title }}">
                </div>
                <div class="form-group">
                    <label for="category_event">Kategori Event</label>
                    <select id="category_event" name="category_event" class="form-control">
                        <option value="{{ $item->category_event }}">Pilih Untuk Diganti ({{ $item->category_event }})</option>
                        <option value="Festival General">Festival General</option>
                        <option value="Workshop">Workshop</option>
                        <option value="Conference">Conference</option>
                        <option value="Concert">Concert</option>
                    </select>
                </div>
                <div class="form-group">
                    <img src="{{ Storage::url($item->banner) }}">
                </div>
                <div class="form-group">
                    <label for="banner">Gambar Banner</label>
                    {{-- <input type="file" class="form-control" name="image" placeholder="Image"> --}}
                    <div class="file-upload ">
                        <div class="file-select">
                            <div class="file-select-button" id="fileName">Pilih Gambar</div>
                            <div class="file-select-name" id="noFile">Tidak ada gambar terpilih</div>
                            <input type="file" name="banner" accept="image/*" id="chooseFile">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="start_on_date">Jadwal Event</label>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="date" name="start_on_date"
                                placeholder="Dari Tanggal" value="{{ $item->start_on_date }}">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="date2" name="until_date"
                                placeholder="Sampai Tanggal" value="{{ $item->until_date }}">
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="time" name="start_at" placeholder="Dari Jam"
                                value="{{ $item->start_at }}">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="time2" name="until_time" placeholder="Sampai Jam"
                                value="{{ $item->until_time }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="event_type">Tipe Event</label>
                    <select id="event_type" name="event_type" class="form-control">
                        <option value="{{ $item->event_type }}">Pilih Untuk Diganti ({{ $item->event_type }})</option>
                        <option value="Online">Online</option>
                        <option value="Offline">Offline</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="venue_name">Nama Tempat</label>
                    <input type="text" class="form-control" name="venue_name" placeholder="Nama Tempat"
                        value="{{ $item->venue_name }}">
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea id="address" name="address" placeholder="Alamat" class="form-control" rows="10">{{ $item->address }}</textarea>
                </div>
                <div class="form-group">
                    <label for="city">Kota</label>
                    <input type="city" class="form-control" name="city" placeholder="Kota"
                        value="{{ $item->city }}">
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" rows="10">{{ $item->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="link">Link Virtual Event</label>
                    <input type="link" class="form-control" name="link" placeholder="Link Virtual Event"
                        value="{{ $item->link }}">
                </div>
                <div class="form-group">
                    <label for="term_and_conditions">Syarat dan Ketentuan</label>
                    <textarea id="term_and_conditions" name="term_and_conditions" rows="10">{{ $item->term_and_condition }}</textarea>
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
        CKEDITOR.replace('term_and_conditions');

    </script>
@endsection
@section('scripts')
    {{-- <script>
        $("#schedule").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
   </script> --}}
    <script>
        jQuery.datetimepicker.setLocale('de');

        jQuery('#date , #date2').datetimepicker({
            i18n: {
                de: {
                    months: [
                        'Januar', 'Februar', 'März', 'April',
                        'Mai', 'Juni', 'Juli', 'August',
                        'September', 'Oktober', 'November', 'Dezember',
                    ],
                    dayOfWeek: [
                        "So.", "Mo", "Di", "Mi",
                        "Do", "Fr", "Sa.",
                    ]
                }
            },
            timepicker: false,
            format: 'Y-m-d'
        });

        jQuery('#time , #time2').datetimepicker({
            datepicker: false,
            format: 'H:i',
            step: 15
        });

    </script>
@endsection