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
      <h2 class="dashboard-title">Detail {{ $item->title }}</h2>
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
          <form action="{{ route('dashboard-ticket-store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <input
                        type="hidden"
                        name="event_id"
                        value="{{ $item->id }}"
                      />
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Ticket Name</label>
                      <input
                        type="text"
                        name="ticket_name"
                        class="form-control"
                        value="{{ old('ticket_name') }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Quantity</label>
                      <input
                        type="number"
                        name="quantity"
                        class="form-control"
                        value="{{ old('quantity') }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Price</label>
                      <input
                        type="number"
                        name="price"
                        class="form-control"
                        value="{{ old('price') }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Expired Ticket</label>
                      <input
                        type="text"
                        name="expired_ticket"
                        class="form-control"
                        value="{{ old('expired_ticket') }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" id="editor">{{ old('description') }}</textarea>
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