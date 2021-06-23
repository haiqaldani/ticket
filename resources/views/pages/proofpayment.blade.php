@extends('layouts.dashboard')

@section('title')
    Tiket Dashboard Transaksi
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Pembayaran {{ $item->code }}</h2>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12 mt-4">
                        <form action="{{ route('processpayment', $item->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 text-center h3">
                                            Transfer ke Rekening
                                        </div>
                                        <div class="col-md-12 text-center">BCA : 18789797 Atas nama Muhammad Haiqal Dani
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile"
                                                        accept="image/*" name="proof_payment">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5 btn-block">
                                                Save Now
                                            </button>
                                        </div>
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
