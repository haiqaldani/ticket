@extends('layouts.dashboard')

@section('title')
    Tiket Dashboard Transaksi
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
                        @foreach ($sellItems as $item)
                            <a href="" class="card card-list d-block">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="{{ Storage::url($item->ticket->event->banner) }}" class="w-50" />
                                        </div>
                                        <div class="col-md-3">
                                            {{ $item->ticket->event->title }}
                                        </div>
                                        <div class="col-md-3">
                                            {{ $item->ticket->ticket_name }}
                                        </div>
                                        <div class="col-md-2">
                                            {{ $item->quantity }} pcs
                                        </div>
                                        <div class="col-md-2">
                                            Rp. {{ number_format($item->price) }}
                                        </div>
                                        <div class="col-md-1 d-none d-md-block">
                                            <img src="/images/dashboard-arrow-right.svg" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
