@extends('layouts.dashboard')

@section('title')
    Store Dashboard Transaction
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Ticket</h2>
                <p class="dashboard-subtitle">

                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12 mt-2">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">Available</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                    role="tab" aria-controls="pills-profile" aria-selected="false">Sold Out</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                @foreach ($items as $item)
                                    @if ($item->event->user_id = Auth::user()->id)
                                        @if ($item->quantity != 0)
                                            <a href="" class="card card-list d-block">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <img src="{{ Storage::url($item->event->banner) }}"
                                                                class="w-50" />
                                                        </div>
                                                        <div class="col-md-3">
                                                            {{ $item->event->title }}
                                                        </div>
                                                        <div class="col-md-3">
                                                            {{ $item->ticket_name }}
                                                        </div>
                                                        <div class="col-md-2">
                                                            {{ $item->quantity }}
                                                        </div>
                                                        <div class="col-md-2">
                                                            {{ $item->price }}
                                                        </div>
                                                        <div class="col-md-1 d-none d-md-block">
                                                            <img src="/images/dashboard-arrow-right.svg" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif

                                    @endif

                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                @foreach ($items as $item)
                                    @if ($item->quantity = 0)
                                        <a href="" class="card card-list d-block">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <img src="{{ Storage::url($item->event->banner) }}"
                                                            class="w-50" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        {{ $item->event->title }}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{ $item->ticket_name }}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{ $item->price }}
                                                    </div>
                                                    <div class="col-md-1 d-none d-md-block">
                                                        <img src="/images/dashboard-arrow-right.svg" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
