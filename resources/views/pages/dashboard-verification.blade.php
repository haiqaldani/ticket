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
                        <div class="d-flex bd-highlight mb-3 justify-content-center">
                            <div class="p-3 bd-highlight">Verifikasi untuk menjadi mitra kami</div>
                            <div class="p-2 bd-highlight"><a href="{{ route('dashboard-verification') }}" class="btn btn-success pl-5 pr-5">Verifikasi</a></div>
                          </div>
                        <form action="{{ route('dashboard-profile-update', 'dashboard-profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Foto KTP</label>
                                                <input type="file" class="form-control" name="id_card_photo"
                                                    value="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomor KTP</label>
                                                <input type="file" class="form-control" name="id_card"
                                                    value="" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama sesuai KTP</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomor HP</label>
                                                <input type="text" class="form-control" name="number_phone"
                                                    value="{{ $item->address }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="text" class="form-control" name="instagram"
                                                    value="{{ $item->instagram }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" class="form-control" name="twitter"
                                                    value="{{ $item->twitter }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" class="form-control" name="facebook"
                                                    value="{{ $item->facebook }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tentang Kami</label>
                                                <input type="text" class="form-control" name="address" id="editor"
                                                    value="{{ $item->about_us }}" />
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
