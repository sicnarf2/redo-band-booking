@extends('layouts.app')

@section('content')
<div class="m-4 p-4">
    <div class="ms-auto text-end mb-3">
        <a data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-primary"> Add booking </a>
    </div>
    @include('bookings.booking-create')

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($bookings as $booking)
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $booking->name }}</h5>
                    <p class="card-text"><strong>ID number:</strong> {{ $booking->id }}</p>
                    <p class="card-text"><strong>Booking Date:</strong> {{ $booking->booking_date }}</p>
                    <p class="card-text"><strong>Booking Time:</strong> {{ $booking->booking_time }}</p>
                    <p class="card-text"><strong>Band:</strong> {{ $booking->band->band_name }}</p>
                    <div class="text-end">
                        <a data-bs-toggle="modal" data-bs-target="#updateModal{{ $booking->id }}" class="btn btn-primary">
                            Edit</a>
                        @include('Bookings.booking-update')
                        <a data-bs-toggle="modal" data-bs-target="#deleteModal{{ $booking->id }}" class="btn btn-danger">
                            Delete</a>
                        @include('Bookings.booking-delete')
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
