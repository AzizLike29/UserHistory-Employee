@props(['stories'])
<!-- Personal Information -->
<div class="row g-3 mb-3">
    <div class="col-12">
        <h5 class="border-bottom pb-2">Personal Information</h5>
    </div>
    <div class="col-md-4">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name"
            value="{{ $stories->first_name ?? '' }}" required>
        <div class="invalid-feedback">Required field</div>
    </div>
    <div class="col-md-4">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name"
            value="{{ $stories->last_name ?? '' }}" required>
        <div class="invalid-feedback">Required field</div>
    </div>
    <div class="col-md-4">
        <label for="date_of_birth" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
            value="{{ $stories->date_of_birth ?? '' }}">
    </div>
    <div class="col-md-6">
        <label for="ktp_number" class="form-label">KTP Number</label>
        <input type="text" class="form-control" id="ktp_number" name="ktp_number"
            value="{{ $stories->ktp_number ?? '' }}" required>
        <div class="invalid-feedback">Enter 16-digit National ID</div>
    </div>
</div>

<!-- Contact Information -->
<div class="row g-3 mb-3">
    <div class="col-12">
        <h5 class="border-bottom pb-2">Contact Information</h5>
    </div>
    <div class="col-md-6">
        <label for="phone" class="form-label">Phone</label>
        <input type="tel" class="form-control" id="phone" name="phone"
            oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="{{ $stories->phone ?? '' }}" required>
        <div class="invalid-feedback">Enter a valid phone number</div>
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $stories->email ?? '' }}">
    </div>
</div>

<!-- Address Information -->
<div class="row g-3 mb-3">
    <div class="col-12">
        <h5 class="border-bottom pb-2">Address Information</h5>
    </div>
    <div class="col-md-4">
        <label for="province" class="form-label">Province</label>
        <select class="form-select" id="province" name="province">
            <option value="" disabled>-- Select Province --</option>
            <option value="Jawa Barat" {{ ($stories->province ?? '') == 'Jawa Barat' ? 'selected' : '' }}>
                Jawa Barat</option>
            <option value="Jawa Tengah" {{ ($stories->province ?? '') == 'Jawa Tengah' ? 'selected' : '' }}>
                Jawa
                Tengah
            </option>
            <option value="Jawa Timur" {{ ($stories->province ?? '') == 'Jawa Timur' ? 'selected' : '' }}>
                Jawa Timur</option>
        </select>
    </div>
    <div class="col-md-4">
        <label for="city" class="form-label">City</label>
        <select class="form-select" id="city" name="city">
            <option value="" disabled>-- Select City --</option>
            @if ($stories->city ?? false)
                <option value="{{ $stories->city }}" selected>{{ $stories->city }}</option>
            @endif
        </select>
    </div>
    <div class="col-md-4">
        <label for="zip_code" class="form-label">ZIP Code</label>
        <input type="text" class="form-control" id="zip_code" name="zip_code"
            value="{{ $stories->zip_code ?? '' }}">
    </div>
    <div class="col-12">
        <label for="street_address" class="form-label">Street Address</label>
        <input type="text" class="form-control" id="street_address" name="street_address"
            value="{{ $stories->street_address ?? '' }}">
    </div>
</div>

<!-- Professional Information -->
<div class="row g-3 mb-3">
    <div class="col-12">
        <h5 class="border-bottom pb-2">Professional Information</h5>
    </div>
    <div class="col-md-6">
        <label for="position" class="form-label">Position</label>
        <select class="form-select" id="position" name="position">
            <option value="" disabled>-- Select Position --</option>
            <option value="Manager" {{ ($stories->position ?? '') == 'Manager' ? 'selected' : '' }}>
                Manager</option>
            <option value="Supervisor" {{ ($stories->position ?? '') == 'Supervisor' ? 'selected' : '' }}>
                Supervisor
            </option>
            <option value="Staff" {{ ($stories->position ?? '') == 'Staff' ? 'selected' : '' }}>
                Staff
            </option>
        </select>
    </div>
</div>

<!-- Bank Information -->
<div class="row g-3 mb-3">
    <div class="col-12">
        <h5 class="border-bottom pb-2">Bank Information</h5>
    </div>
    <div class="col-md-6">
        <label for="bank_account_name" class="form-label">Bank Name</label>
        <select class="form-select" id="bank_account_name" name="bank_account_name">
            <option value="" disabled>-- Select Bank --</option>
            <option value="Mandiri" {{ ($stories->bank_account_name ?? '') == 'Mandiri' ? 'selected' : '' }}>
                Mandiri</option>
            <option value="BCA" {{ ($stories->bank_account_name ?? '') == 'BCA' ? 'selected' : '' }}>
                BCA
            </option>
            <option value="BRI" {{ ($stories->bank_account_name ?? '') == 'BRI' ? 'selected' : '' }}>
                BRI
            </option>
            <option value="BNI" {{ ($stories->bank_account_name ?? '') == 'BNI' ? 'selected' : '' }}>
                BNI
            </option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="bank_account_number" class="form-label">Bank Account Number</label>
        <input type="text" class="form-control" id="bank_account_number" name="bank_account_number"
            value="{{ $stories->bank_account_number ?? '' }}">
    </div>
</div>

<!-- Document Upload -->
<div class="row g-3 mb-3">
    <div class="col-12">
        <h5 class="border-bottom pb-2">Document Upload</h5>
    </div>
    <div class="col-md-6">
        <label for="scan_ktp_url_drive" class="form-label">KTP Scan</label>
        @if ($stories->scan_ktp_url_drive ?? false)
            <div class="mb-2">
                <span class="text-muted">Current document:</span>
                <a href="{{ $stories->scan_ktp_url_drive }}" target="_blank">View Document</a>
            </div>
        @endif
        <div class="border border-dashed rounded p-3">
            <input type="file" class="form-control border-0" id="scan_ktp_url_drive" name="scan_ktp_url_drive">
            <small class="text-muted">Replace file if needed</small>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/registration-form.js') }}"></script>
@endpush
