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
                            <h5 class="text-black">Syarat dan Ketentuan</h5>
                            {!! $item->term_and_conditions !!}
                        </div>

                        <div role="tabpanel" class="tab-pane" id="buzz">
                            <form action="{{ route('cart') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @php $no = 1; @endphp
                                @foreach ($item->ticket as $item)
                                    <input type="hidden" value="{{ $item->id }}" name="ticket_id[]">
                                    <input type="hidden" value="{{ $item->price }}" name="price[]">
                                    <div class="card border mt-2">
                                        <div class="card-body">
                                            <h5 class="card-title border-bottom pb-2">{{ $item->ticket_name }}</h5>
                                            <div class="d-flex bd-highlight">
                                                <div class="flex-fill bd-highlight col-lg-8">
                                                    {!! $item->description !!}
                                                    
                                                </div>
                                                <div class="flex-fill bd-highlight col-lg-4">
                                                    <input type="number" name="quantity[]" id="" min="0" placeholder="0" value=""
                                                        max="{{ $item->quantity }}">
                                                </div>
                                            </div>
                                            <h5 class="card-title border-bottom pb-2">Rp. {{ number_format($item->price ?? 0) }}</h5>
                                            <p class="card-text">Berakhir Tanggal
                                                {{ \Carbon\Carbon::parse($item->expired_ticket)->format('d F Y') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                <button type="submit" class="btn btn-success col-lg-12 mt-3">Pesan Tiket</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div>

    </div>
@endsection
@push('addon-script')
    <script src="{{ url('backend/libraries/bootstrap-input-spinner.js') }}"></script>
    <script>
        $("input[type='number']").inputSpinner()

    </script>
@endpush
