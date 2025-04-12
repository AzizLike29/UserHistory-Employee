@props(['UserStories'])
<div class="card-body">
    <!-- Personal Information -->
    <h5 class="section-title">Personal Information</h5>
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="detail-label">First Name</div>
            <div class="detail-value">{{ $UserStories->first_name ?? 'N/A' }}</div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="detail-label">Last Name</div>
            <div class="detail-value">{{ $UserStories->last_name ?? 'N/A' }}</div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="detail-label">Date of Birth</div>
            <div class="detail-value">
                @if ($UserStories->date_of_birth)
                    {{ \Carbon\Carbon::parse($UserStories->date_of_birth)->format('d F Y') }}
                @else
                    N/A
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="detail-label">KTP Number</div>
            <div class="detail-value">{{ $UserStories->ktp_number ?? 'N/A' }}</div>
        </div>
    </div>

    <!-- Contact Information -->
    <h5 class="section-title">Contact Information</h5>
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="detail-label">Phone</div>
            <div class="detail-value">{{ $UserStories->phone ?? 'N/A' }}</div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="detail-label">Email</div>
            <div class="detail-value">{{ $UserStories->email ?? 'N/A' }}</div>
        </div>
    </div>

    <!-- Address Information -->
    <h5 class="section-title">Address Information</h5>
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="detail-label">Province</div>
            <div class="detail-value">{{ $UserStories->province ?? 'N/A' }}</div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="detail-label">City</div>
            <div class="detail-value">{{ $UserStories->city ?? 'N/A' }}</div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="detail-label">ZIP Code</div>
            <div class="detail-value">{{ $UserStories->zip_code ?? 'N/A' }}</div>
        </div>
        <div class="col-12 mb-3">
            <div class="detail-label">Street Address</div>
            <div class="detail-value">{{ $UserStories->street_address ?? 'N/A' }}</div>
        </div>
    </div>

    <!-- Professional Information -->
    <h5 class="section-title">Professional Information</h5>
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="detail-label">Position</div>
            <div class="detail-value">{{ $UserStories->position ?? 'N/A' }}</div>
        </div>
    </div>

    <!-- Bank Information -->
    <h5 class="section-title">Bank Information</h5>
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="detail-label">Bank Name</div>
            <div class="detail-value">{{ $UserStories->bank_account_name ?? 'N/A' }}</div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="detail-label">Bank Account Number</div>
            <div class="detail-value">{{ $UserStories->bank_account_number ?? 'N/A' }}</div>
        </div>
    </div>

    <!-- Documents -->
    <h5 class="section-title">Documents</h5>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="detail-label mb-2">KTP Scan</div>
            @if ($UserStories->scan_ktp_url_drive)
                <div class="document-preview">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-file-earmark-text me-2 fs-4"></i>
                        <div>
                            <div>KTP Document</div>
                            <div>
                                <a href="{{ $UserStories->scan_ktp_url_drive }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary mt-1">
                                    <i class="bi bi-eye"></i> View Document
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="detail-value">document not uploaded</div>
            @endif
        </div>
    </div>
</div>
