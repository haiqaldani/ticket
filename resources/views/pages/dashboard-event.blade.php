@extends('layouts.dashboard')

@section('title')
    Ticket Dashboard Event
@endsection

@section('content')
    <!-- Section Content -->
          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">My Events</h2>
                <p class="dashboard-subtitle">
                  Manage it well and get money
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <a
                      href="{{ route('dashboard-event-create') }}"
                      class="btn btn-success"
                      >Add New Event</a
                    >
                  </div>
                </div>
                <div class="row mt-4">

                  @foreach ($events as $event)
                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div onclick="location.href='{{ route('dashboard-event-detail', $event->id) }}';"
                          class="card card-dashboard-event d-block" style="cursor: pointer;"
                        >
                          <div class="card-body">
                            <img
                              src="{{ Storage::url($event->banner) }}"
                              alt=""
                              class="w-100 mb-2"
                            />
                            
                            <div class="event-title font-weight-bold">{{ $event->title }}</div>
                            <div class="event-category">{{ $event->category_event }}</div>
                            <div class="">
                                <a
                                href="{{ route('dashboard-ticket-add', $event->id) }}"
                                class="btn btn-primary col-12"
                                >Add Ticket</a>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                  @endforeach

                </div>
              </div>
            </div>
          </div>
@endsection