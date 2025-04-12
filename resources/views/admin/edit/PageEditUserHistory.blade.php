@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/edit-user-history.css') }}">
@endpush

@section('content')
    <div class="container mt-4">
        <h4 class="mb-3">Edit Registration</h4>

        <div class="card">
            <div class="card-body" id="head-body">
                @foreach ($editUserStories as $stories)
                    <form action="{{ route('userstory.update', ['id' => $stories->id]) }}" method="POST"
                        enctype="multipart/form-data" class="needs-validation" novalidate>
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        {{-- components edit registration --}}
                        <x-form.edit-form :stories="$stories" />
                        <div class="row mt-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-4">Update</button>
                                <a href="{{ route('userstory.index') }}" class="btn btn-secondary px-4 ms-2">Cancel</a>
                            </div>
                        </div>
                @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection
