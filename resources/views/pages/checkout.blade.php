@extends('layouts.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
    <!-- Page Content -->
    <div class="page-content page-cart">
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
                                    Cart
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-cart">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12 table-responsive">
                        <table class="table table-borderless table-cart">
                            <thead>
                                <tr>
                                    <td>Name &amp; Seller</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                    <td>Menu</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalPrice = 0 @endphp
                                @foreach ($carts as $cart)
                                    @if ($cart->ticket->expired_ticket >= \Carbon\Carbon::now()->toDateString())
                                        <tr>
                                            <td style="width: 35%;">
                                                <div class="product-title">{{ $cart->ticket->ticket_name }}</div>
                                                <div class="product-subtitle">by {{ $cart->ticket->event->user->name }}
                                                </div>
                                            </td>
                                            <td style="width: 20%;">
                                                <div class="product-title">{{ $cart->quantity }}</div>
                                                <div class="product-subtitle"></div>
                                            </td>
                                            @php
                                                $price = $cart->quantity * $cart->price;
                                            @endphp
                                            <td style="width: 35%;">
                                                <div class="product-title">Rp. {{ number_format($price) }}</div>
                                                <div class="product-subtitle"></div>
                                            </td>
                                            <td style="width: 10%;">
                                                <form action="{{ route('transaction-detail-delete', $cart->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-remove-cart" type="submit">
                                                        Remove
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php $totalPrice += $price @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-4">Shipping Details</h2>
                    </div>
                </div>
                <form action="{{ route('process') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                    <input type="hidden" name="transaction_id" value="{{ $cart->transaction->id }}">
                    {{-- <input type="hidden" name="status" value="1"> --}}
                    <input type="hidden" name="id" value="{{ $cart->id }}">
                    <div class="row mb-2" data-aos="fade-up" data-aos-delay="200" id="locations">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ Auth::user()->name }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nomor Telepon</label>
                                <input type="text" class="form-control" id="name" name="phone_number"
                                    placeholder="Cth: 6285359186052" value="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ Auth::user()->email }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-12">
                            <h2 class="mb-1">Payment Informations</h2>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-4 col-md-4">
                            <div class="product-title">Rp.0</div>
                            <div class="product-subtitle">Country Tax</div>
                        </div>
                        <div class="col-4 col-md-5">
                            <div class="product-title text-success">Rp. {{ number_format($totalPrice ?? 0) }}</div>
                            <div class="product-subtitle">Total</div>
                        </div>
                        <div class="col-8 col-md-3">
                            <button type="submit" class="btn btn-success  mt-4 px-4 btn-block">
                                Checkout Now
                            </button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('transaction-delete') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger mt-4 px-4 btn-block" type="submit">
                        Batal
                    </button>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endpush
