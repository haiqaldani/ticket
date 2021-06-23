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
                            @if (\Carbon\Carbon::now() < \Carbon\Carbon::parse($item->ticket->expired_ticket))
                                <a @if ($item->transaction->proof_payment == null) href="{{ route('proofpayment', $item->transaction->id) }}" @endif
                                    class="card card-list d-block" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                {{ $item->transaction->code }}
                                            </div>
                                            <div class="col-md-3">
                                                Rp. {{ number_format($item->transaction->total_price) }}
                                            </div>
                                            <div class="col-md-3">
                                                {{ \Carbon\Carbon::parse($item->transaction->created_at)->format(' d F Y') }}
                                            </div>
                                            <div class="col-md-4">
                                                @if ($item->transaction->proof_payment == null)
                                                    Upload Pembayaran
                                                @elseif($item->transaction->transaction_status == 'PROCESS')
                                                    Pembayaran sedang diproses
                                                @else
                                                    Pembayaran berhasil
                                                @endif
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
@endsection
