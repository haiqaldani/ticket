@extends('layouts.dashboard')

@section('title')
    Tiket Dashboard Transaksi
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Tickets Sold</h2>
                <p class="dashboard-subtitle">

                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    @foreach ($sellItems as $item)
                        <div class="col-12">
                            <div class="accordion card card-list d-block" id="accordionExample">
                                <div class="card-body">
                                    <div class="" id="heading{{ $item->id }}">
                                        <h2 class="mb-0">
                                            <button class="btn btn-block text-left" type="button" style="font-size: 18px"
                                                data-toggle="collapse" data-target="#collapse{{ $item->id }}"
                                                aria-expanded="false" aria-controls="collapse{{ $item->id }}">
                                                {{ $item->title }}
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse{{ $item->id }}" class="collapse"
                                        aria-labelledby="heading{{ $item->id }}" data-parent="#accordionExample">
                                        @php
                                            $totalall = 0;
                                        @endphp
                                        @foreach ($item->ticket as $items)
                                            <div class="mx-4" style="font-size: 15px">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        {{ $items->ticket_name }}
                                                    </div>
                                                    <div class="col-md-3">
                                                        @php
                                                            $totalqty = DB::select('select * from transaction_details where ticket_id = :id', ['id' => $items->id]);
                                                            $total = 0;
                                                        @endphp
                                                        @foreach ($totalqty as $items)
                                                            @php $total += $items->quantity @endphp
                                                        @endforeach

                                                        {{ $total }} pcs
                                                    </div>
                                                    <div class="col-md-3">
                                                        @php
                                                            $totalprice = $total * $items->price;
                                                        @endphp
                                                        Rp. {{ number_format($totalprice) }}
                                                    </div>
                                                </div>
                                            </div>
                                            @php $totalall += $totalprice @endphp
                                        @endforeach
                                        <div class="row">
                                            <div class="col-md-6">
                                                @if ($item->fund)
                                                    @if ($item->fund->status == 'PROCESS')
                                                        Pencairan sedang diproses
                                                    @elseif ($item->fund->status == 'SUCCESS')
                                                        Pencairan berhasil
                                                    @endif
                                                @else
                                                    <form action="{{ route('processfund') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="event_id" value="{{ $item->id }}">
                                                        <input type="hidden" name="total_price"
                                                            value="{{ $totalall }}">

                                                        <button class="btn btn-success" type="submit" @if (\Carbon\Carbon::now() >= \Carbon\Carbon::parse($item->until_date)) disabled @endif>
                                                            @if (\Carbon\Carbon::now() < \Carbon\Carbon::parse($item->until_date))
                                                                Ajukan Pencairan
                                                            @elseif (\Carbon\Carbon::now() >=
                                                                \Carbon\Carbon::parse($item->until_date))
                                                                Pecairan tersedia jika event berakhir
                                                            @endif
                                                        </button>
                                                    </form>
                                                @endif

                                            </div>
                                            <div class="col-md-6 text-right">Total : Rp. {{ number_format($totalall) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- @foreach ($sellItems as $item)
                            <a href="" class="card card-list d-block">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="{{ Storage::url($item->event->banner) }}" class="w-50" />
                                        </div>
                                        <div class="col-md-3">
                                            {{ $item->event->title }}
                                        </div>
                                        <div class="col-md-3">
                                            {{ $item->ticket_name }}


                                        </div>
                                        <div class="col-md-2">
                                            @php
                                                $totalqty = DB::select('select * from transaction_details where ticket_id = :id', ['id' => $item->id]);
                                                $total = 0;
                                            @endphp
                                            @foreach ($totalqty as $items)
                                                @php $total += $items->quantity @endphp
                                            @endforeach

                                            {{ $total }} pcs
                                        </div>
                                        <div class="col-md-2">
                                            @php
                                                $totalprice = $total * $item->price;
                                            @endphp
                                            Rp. {{ number_format($totalprice) }}
                                        </div>
                                        <div class="col-md-1 d-none d-md-block">
                                            <img src="/images/dashboard-arrow-right.svg" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
