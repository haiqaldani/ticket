@extends('layouts.dashboard')

@section('title')
    Store Settings
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Profile Saya</h2>
                {{-- <p class="dashboard-subtitle">
                    Make store that profitable
                </p> --}}
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        @if ($account == 0)
                            <form action="{{ route('dashboard-account-post') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" class="form-control" name="user_id"
                                                value="{{ Auth::user()->id }}" />
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Bank</label>
                                                    <input type="text" class="form-control" name="bank_name" value=""
                                                        placeholder="Cth: BCA" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nomor Rekening</label>
                                                    <input type="text" class="form-control" name="account_number"
                                                        value="" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nama Pemilik Rekening</label>
                                                    <input type="text" class="form-control" name="account_holder"
                                                        value="" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col text-right">
                                                <button type="submit" class="btn btn-success px-5">
                                                    Save Now
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        @else
                            <form action="{{ route('dashboard-account-update') }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" class="form-control" name="user_id"
                                                value="{{ Auth::user()->id }}" />
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Bank</label>
                                                    <input type="text" class="form-control" name="bank_name" value="{{ $item->bank_name }}"
                                                        placeholder="Cth: BCA" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nomor Rekening</label>
                                                    <input type="text" class="form-control" name="account_number"
                                                        value="{{ $item->account_number }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nama Pemilik Rekening</label>
                                                    <input type="text" class="form-control" name="account_holder"
                                                        value="{{ $item->account_holder }}" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col text-right">
                                                <button type="submit" class="btn btn-success px-5">
                                                    Save Now
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
