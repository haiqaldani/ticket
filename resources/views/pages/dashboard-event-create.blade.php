@extends('layouts.dashboard')

@section('title')
    Ticket Dashboard Add Event
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Create Event</h2>
                <p class="dashboard-subtitle">
                    Create your own product
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('dashboard-event-store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Judul Event</label>
                                                <input type="text" class="form-control" name="title" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kategori Event</label>
                                                <select name="category_event" class="form-control" id="category_event">
                                                    <option value="">Pilih Kategori Event</option>
                                                    <option value="Festival General">Festival General</option>
                                                    <option value="Workshop">Workshop</option>
                                                    <option value="Conference">Conference</option>
                                                    <option value="Concert">Concert</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tipe Event</label>
                                                <select name="catagory_event" class="form-control" id="category_event">
                                                    <option value="">Pilih Tipe Event</option>
                                                    <option value="Offline">Offline</option>
                                                    <option value="Online">Online</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Tanggal Event</label>

                                                    <input type="text" class="form-control"
                                                        value="" name="start_on_date" id="date">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Sampai Tanggal</label>

                                                    <input type="text" class="form-control" 
                                                        value="" name="until_date" id="date2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Jam Event</label>

                                                    <input type="text" class="form-control"
                                                        value="" name="start_at" id="time">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Sampai Jam</label>

                                                    <input type="text" class="form-control" 
                                                        value="" name="until_time" id="time2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Tempat</label>
                                                <input type="text" class="form-control" name="venue_name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kota</label>
                                                <input type="text" class="form-control" name="city" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" name="address" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Deskripsi Event</label>
                                                <textarea name="description" id="editor"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Syarat dan Ketentuan</label>
                                                <textarea name="term_and_conditions" id="editor2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Banner Event</label>
                                                <input type="file" name="banner" accept="image/*" class="form-control" />
                                                {{-- <p class="text-muted">
                        Kamu dapat memilih lebih dari satu file
                      </p> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5">
                                                Save Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('addon-style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/libraries/bootstrap-datetimepicker.min.css') }}" />

@endpush
@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace("editor");
        CKEDITOR.replace("editor2");

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ url('backend/libraries/bootstrap-datetimepicker.min.js') }}">
    </script>

    <script type="text/javascript">
        $(function() {
            $('#date , #date2').datetimepicker({
                format: 'l',
                format: 'YYYY-MM-DD'
            });
        });
        $(function() {
            $('#time , #time2').datetimepicker({
                format: 'LT',
                format: 'hh:mm',
            });
        });

    </script>
@endpush
