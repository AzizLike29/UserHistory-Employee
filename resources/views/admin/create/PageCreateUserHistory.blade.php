@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/create-user-history.css') }}">
@endpush


@section('content')
    <div class="container mt-4">
        <h4 class="mb-3">Registration Form</h4>

        <div class="card">
            <div class="card-body" id="head-body">
                <form action="{{ route('userstory.store') }}" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    @csrf
                    {{-- components form registration --}}
                    <x-form.registration-form />
                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary px-4 me-2">Submit</button>
                            <a href="{{ route('userstory.index') }}" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/validation-required.js') }}"></script>
@endpush
