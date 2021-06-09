@extends('layouts.dashboard')

@section('title')
    Ticket Dashboard Add Event
@endsection

@section('content')
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Create Product</h2>
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
            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Judul Event</label>
                      <input type="text" class="form-control" name="title"/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kategori Event</label>
                      <select name="catagory_event" class="form-control" id="category_event">
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
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama Tempat</label>
                      <input type="text" class="form-control" name="venue_name"/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kota</label>
                      <input type="text" class="form-control" name="city"/>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" name="address"/>
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
                      <textarea name="term_and_condition" id="editor2"></textarea>
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
                    <button
                      type="submit"
                      class="btn btn-success px-5"
                    >
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

@push('addon-script')
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace("editor");
    CKEDITOR.replace("editor2");
  </script>
@endpush