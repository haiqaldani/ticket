@extends('layouts.app')

@section('title')
    Ticket Homepage
@endsection

@section('content')
    <div class="page-content page-home">
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="zoom-in">
                        <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($items as $item)
                                    <li @if($item == reset($items)) class="active" @endif data-target="#storeCarousel" data-slide-to="{{ $no++ }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($items as $items)
                                    <div class="caraousel-item  @if($item == reset($item))) active @endif">
                                        <img src="{{ Storage::url($item->image) }}" alt="Carousel Image"
                                            class="d-block w-100" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="store-trend-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Trend Categories</h5>
                    </div>
                </div>
                <div class="row">
                    @php $incrementCategory = 0 @endphp
                    @forelse ($categories as $category)
                        <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up"
                            data-aos-delay="{{ $incrementCategory += 100 }}">
                            <a href="{{ route('categories-detail', $category->slug) }}"
                                class="component-categories d-block">
                                <div class="categories-image">
                                    <img src="{{ Storage::url($category->photo) }}" alt="" class="w-100" />
                                </div>
                                <p class="categories-text">
                                    {{ $category->name }}
                                </p>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                            No Categories Found
                        </div>
                    @endforelse
                </div>
            </div>
        </section> --}}

        <section class="ticket-new-events">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>New Events</h5>
                    </div>
                </div>
                <div class="row">
                    @php $incrementEvent = 0 @endphp
                    @forelse ($events as $event)
                        <div
                        class="col-6 col-md-4 col-lg-3"
                        data-aos="fade-up"
                        data-aos-delay="{{  $incrementEvent += 100 }}"
                        >
                            <a href="{{ route('detail-event', $event->slug) }}" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div
                                    class="products-image"
                                    style="background-image: url('{{ Storage::url($event->banner) }}');"
                                    ></div>
                                </div>
                                <div class="products-text">
                                    {{  $event->title }}
                                </div>
                                <div class="products-price">
                                    @if ($event->event_type == 'Online')
                                        Event Online
                                    @else
                                        {{ $item->city }}
                                    @endif
                                </div>
                            </a>
                        </div>
                    @empty
                        <div
                                class="col-12 text-center py-5"
                                data-aos="fade-up"
                                data-aos-delay="100"
                            >
                                No Events Found
                            </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
