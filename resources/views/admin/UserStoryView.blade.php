@extends('layouts.app')

@section('content')
    @include('partials.messages')
    <div class="container-fluid px-4">
        @include('partials.user.user-history-header')
        <div class="card">
            <div class="card-body">
                {{-- buat input form cari data berdasarkan posisi --}}
                <div class="d-flex justify-content-end">
                    <label for="filterPosition" class="me-2 mt-1">Filter Position:</label>
                    <select id="filterPosition" class="form-select form-select-sm w-25 p-2">
                        <option value="" selected disabled>-- Select Position --</option>
                        @php
                            $positions = $userStories->pluck('position')->unique();
                        @endphp
                        @foreach ($positions as $position)
                            <option value="{{ $position }}">{{ $position }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover w-100 nowrap" id="DataTableUserHistory">
                        <thead id="DataTablehead">
                            <tr>
                                <th>Full Name</th>
                                <th>Position</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address City/Province</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userStories as $stories)
                                <tr>
                                    <td>{{ $stories->first_name }} {{ $stories->last_name }}</td>
                                    <td>{{ $stories->position }}</td>
                                    <td>{{ $stories->email }}</td>
                                    <td>{{ $stories->phone }}</td>
                                    <td>{{ $stories->city }}/{{ $stories->province }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('userstory.show', ['id' => $stories->id]) }}"
                                                class="btn btn-secondary btn-sm">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('userstory.edit', $stories->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('userstory.destroy', $stories->id) }}" method="POST"
                                                onsubmit="return confirm('Mau hapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/datatables-index.js') }}"></script>
@endpush
