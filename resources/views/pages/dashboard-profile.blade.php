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
                            <div class="p-2 bd-highlight"><a href="" class="btn btn-success pl-5 pr-5">Verifikasi</a></div>
                          </div>
                        <form action="{{ route('dashboard-profile-update', 'dashboard-profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                @if ($item->cover != null)
                                                    <img src="{{ Storage::url($item->cover) }}" alt="">
                                                @else
                                                    <div class="border border-dark text-center p-5">
                                                        <h3>Unggah gambar/poster/banner</h3>
                                                        <p>Direkomendasikan 1500 x 500px dan tidak lebih dari 2Mb</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="file" name="banner" accept="image/*" class="form-control" />
                                                {{-- <p class="text-muted">
                        Kamu dapat memilih lebih dari satu file
                      </p> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tautan Singkat Profil</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">https://ticket.com/profile/</div>
                                                    </div>
                                                    <input type="text" name="slug"  class="form-control" id="inlineFormInputGroup"
                                                        value="@if ($item->slug != null) {{ $item->slug }} @endif" @if ($item->slug != null) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                @if ($item->profile_picture != null)
                                                    <img src="{{ Storage::url($item->profile_picture) }}" alt=""
                                                        class="rounded-circle">
                                                @else
                                                    <img src="/backend/img/profile.png" alt="" class="rounded-circle w-100">
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-9 d-flex align-items-center">
                                            <input type="file" name="profile_picture" accept="image/*"
                                                class="form-control absolute" />
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $item->name }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email"
                                                    value="{{ $item->email }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" name="address"
                                                    value="{{ $item->address }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomor HP</label>
                                                <input type="text" class="form-control" name="number_phone"
                                                    value="{{ $item->number_phone }}" />
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
@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace("editor");

    </script>
@endpush
