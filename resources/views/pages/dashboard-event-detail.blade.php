@extends('layouts.dashboard')

@section('title')
    Dashboard Event Detail
@endsection

@section('content')
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Detail {{ $event->title }}</h2>
      <p class="dashboard-subtitle">
        Event Detail
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
          <form action="{{ route('dashboard-event-update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="d-flex form-group gallery-container justify-content-center">
                      <img
                        src="{{ Storage::url($event->banner ?? '') }}"
                        alt=""
                        class="w-50"
                      />
                      {{-- <a href="{{ route('dashboard-event-gallery-delete', $event->id) }}" class="delete-gallery">
                        <img src="/images/icon-delete.svg" alt="" />
                      </a> --}}
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="banner" accept="image/*" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                      </div>
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Event Name</label>
                      <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ $event->title }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Category Event</label>
                      <select class="form-control" name="category_event">
                        <option value="{{ $event->category_event }}">Tidak Diganti ({{ $event->category_event }})</option>
                        <option value="Festival General">Festival General</option>
                        <option value="Workshop">Workshop</option>
                        <option value="Conference">Conference</option>
                        <option value="Concert">Concert</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Event Type</label>
                      <select class="form-control" name="category_event">
                        <option value="{{ $event->event_type }}">Tidak Diganti ({{ $event->event_type }})</option>
                        <option value="Online">Online</option>
                        <option value="Offline">Offline</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Venue Name</label>
                      <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ $event->venue_name }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Address</label>
                      <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ $event->address }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>City</label>
                      <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ $event->city }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Link Virtual Event</label>
                      <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ $event->link }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" id="editor">{!! $event->description !!}</textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Term and Condition</label>
                      <textarea name="term_and_condition" id="term">{!! $event->term_and_condition !!}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5 btn-block"
                    >
                      Save Now
                    </button>
                  </div>
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
    function thisFileUpload() {
      document.getElementById("file").click();
    }
  </script>
  <script>
    CKEDITOR.replace("editor");
    CKEDITOR.replace("term");
  </script>
@endpush