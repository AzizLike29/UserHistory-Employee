@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/detail-user-history.css') }}">
@endpush

@section('content')
    @foreach ($showUserStories as $UserStories)
        <div class="container mt-4" id="details-container">
            @include('partials.user.user-details-header', ['UserStories' => $UserStories])
            <div class="card mb-4">
                <x-form.detail-form :UserStories="$UserStories" />
            </div>
        </div>
    @endforeach
@endsection
