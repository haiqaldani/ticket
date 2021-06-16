@extends('layouts.dashboard')

@section('title')
    Tiket Dashboard Transaksi
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Transaksi Saya</h2>
                <p class="dashboard-subtitle">

                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12 mt-3">
                        @foreach ($items as $item)
                            <a href="@if($item->proof_payment == null) {{ route('dashboard-proofpayment', $item->id) }} @endif" class="card card-list d-block" >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            {{ $item->code }}
                                        </div>
                                        <div class="col-md-2">
                                            {{ $item->transaction_status }}
                                        </div>
                                        <div class="col-md-2">
                                            Rp. {{ number_format($item->total_price)}}
                                        </div>
                                        <div class="col-md-2">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format(' d F Y') }}
                                        </div>
                                        <div class="col-md-4">
                                            @if($item->proof_payment == null)
                                                <p>Upload Pembayaran</p>
                                            @elseif($item->transaction_status == 'PROCESS')
                                                <p>Pembayaran sedang diproses</p>
                                            @else
                                                <p>Pembayaran berhasil</p>
                                            @endif
                                            
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