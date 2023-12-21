@extends('layouts.app')

@section('content')
<div class="m-4 p-4">
    <div class="ms-auto text-end mb-3">
        <a data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-primary"> Add Band </a>
    </div>
    @include('Bands.band-create')

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($bands as $band)
        <div class="col">
            <div class="card">
                <img src="{{asset('/images/band.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$band->band_name}}</h5>
                    <p class="card-text"><span class="fw-bold">Genre: </span>{{ $band->genre }}</p>
                    <p class="card-text"><span class="fw-bold">Started since: </span>{{ $band->year_started }}</p>
                    <p class="card-text">{{ $band->membersCount }} members</p>
                    <a href="/bookings" class="btn btn-primary">Book now!</a>
                    <a data-bs-toggle="modal" data-bs-target="#updateModal{{ $band->id }}" class="btn btn-primary">
                        Edit</a>
                    @include('Bands.band-update')
                    <a data-bs-toggle="modal" data-bs-target="#deleteModal{{ $band->id }}" class="btn btn-danger">
                        Delete </a>
                    @include('Bands.band-delete')
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
