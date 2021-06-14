@extends('layouts.app')

@section('title')
    Store Detail Page
@endsection

@section('content')
    <!-- Page Content -->
    <div class="page-content page-details">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Event Detail
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-gallery mb-3" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="zoom-in">
                        <transition name="slide-fade" mode="out-in">
                            <img src="{{ Storage::url($item->banner) }}" class="w-100 main-image" alt="" />
                        </transition>
                    </div>
                </div>
            </div>
        </section>

        <div class="store-details-container" data-aos="fade-up">
            <section class="store-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>{{ $item->title }}</h1>
                            <div>{{ $item->category_event }}</div>
                            <div class="col-lg-12 border-bottom p-2"></div>
                            {{-- <div class="owner">By {{ $item->user->name }}</div> --}}
                            {{-- <div class="price">${{ number_format($item->price) }}</div> --}}
                        </div>
                        <div class="col-lg-5 pt-3">
                            <div class="row">
                                <h6 class="col-lg-12">Diselenggarakan Oleh</h6>
                                <div class="d-flex bd-highlight pt-3">
                                    <div class="flex-fill bd-highlight col-lg-3">
                                        <img src="@if ($item->user->profile_picture != null) {{ Storage::url($item->user->profile_picture) }} @else
                                            /backend/img/profile.png @endif" class="rounded-circle w-100">
                                    </div>
                                    <div class="flex-fill bd-highlight col-lg-9 align-self-center">
                                        <p>{{ $item->user->name }}</p>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        <div class="col-lg-4 pt-3">
                            <h6>Waktu dan Tempat</h6>
                            <p class="pt-4">
                                {{ \Carbon\Carbon::parse($item->start_on_date)->format('d M Y') }}
                                -
                                {{ \Carbon\Carbon::parse($item->until_date)->format('d M Y') }}
                            </p>
                            <p class="">
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->start_at)->format('H:i') }}
                                -
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->until_time)->format('H:i') }}
                                WIB
                            </p>
                        </div>
                        <div class="col-lg-3 pt-3">
                            <h6>Lokasi</h6>
                            @if ($item->event_type == 'Online')
                                <p class="pt-4">Event Online</p>
                            @else
                                <p class="pt-4">{{ $item->venue_name }},{{ $item->city }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <section class="store-description">
                <div class="container">
                    <ul class="nav nav-tabs nav-justified hg-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Deskripsi Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Kategori Tiket</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane in active" id="profile">
                            {!! $item->description !!}
                        </div>

                        <div role="tabpanel" class="tab-pane" id="buzz">
                            
                        </div>
                </div>
        </div>
        </section>
        {{-- <section class="store-description">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            {!! $item->description !!}
                        </div>
                    </div>
                </div>
            </section> --}}
        {{-- <section class="store-review">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8 mt-3 mb-3">
                <h5>Customer Review (3)</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-8">
                <ul class="list-unstyled">
                  <li class="media">
                    <img
                      src="/images/icons-testimonial-1.png"
                      alt=""
                      class="mr-3 rounded-circle"
                    />
                    <div class="media-body">
                      <h5 class="mt-2 mb-1">Hazza Risky</h5>
                      I thought it was not good for living room. I really happy
                      to decided buy this product last week now feels like
                      homey.
                    </div>
                  </li>
                  <li class="media">
                    <img
                      src="/images/icons-testimonial-2.png"
                      alt=""
                      class="mr-3 rounded-circle"
                    />
                    <div class="media-body">
                      <h5 class="mt-2 mb-1">Anna Sukkirata</h5>
                      Color is great with the minimalist concept. Even I thought
                      it was made by Cactus industry. I do really satisfied with
                      this.
                    </div>
                  </li>
                  <li class="media">
                    <img
                      src="/images/icons-testimonial-3.png"
                      alt=""
                      class="mr-3 rounded-circle"
                    />
                    <div class="media-body">
                      <h5 class="mt-2 mb-1">Dakimu Wangi</h5>
                      When I saw at first, it was really awesome to have with.
                      Just let me know if there is another upcoming product like
                      this.
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section> --}}
    </div>
    </div>
@endsection
