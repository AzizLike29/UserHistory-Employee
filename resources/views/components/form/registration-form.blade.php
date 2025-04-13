<!-- Personal Information -->
<div class="row g-3 mb-3">
    <div class="col-12">
        <h5 class="border-bottom pb-2">Personal Information</h5>
    </div>
    <div class="col-md-4">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" required>
        <div class="invalid-feedback">Required field</div>
    </div>
    <div class="col-md-4">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" required>
        <div class="invalid-feedback">Required field</div>
    </div>
    <div class="col-md-4">
        <label for="date_of_birth" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
    </div>
    <div class="col-md-6">
        <label for="ktp_number" class="form-label">KTP Number</label>
        <input type="text" class="form-control" id="ktp_number" name="ktp_number" required>
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
            oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
        <div class="invalid-feedback">Enter a valid phone number</div>
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
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
            <option value="" selected disabled>-- Select Province --</option>
            <option value="Jawa Barat">Jawa Barat</option>
            <option value="Jawa Tengah">Jawa Tengah</option>
            <option value="Jawa Timur">Jawa Timur</option>
        </select>
    </div>
    <div class="col-md-4">
        <label for="city" class="form-label">City</label>
        <select class="form-select" id="city" name="city" disabled>
        </select>
    </div>
    <div class="col-md-4">
        <label for="zip_code" class="form-label">ZIP Code</label>
        <input type="text" class="form-control" id="zip_code" name="zip_code">
    </div>
    <div class="col-12">
        <label for="street_address" class="form-label">Street Address</label>
        <input type="text" class="form-control" id="street_address" name="street_address">
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
            <option value="" selected disabled>-- Select Position --</option>
            <option value="Manager">Manager</option>
            <option value="Supervisor">Supervisor</option>
            <option value="Staff">Staff</option>
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
            <option value="" selected disabled>-- Select Bank --</option>
            <option value="Mandiri">Mandiri</option>
            <option value="BCA">BCA</option>
            <option value="BRI">BRI</option>
            <option value="BNI">BNI</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="bank_account_number" class="form-label">Bank Account Number</label>
        <input type="text" class="form-control" id="bank_account_number" name="bank_account_number">
    </div>
</div>

<!-- Document Upload -->
<div class="row g-3 mb-3">
    <div class="col-12">
        <h5 class="border-bottom pb-2">Document Upload</h5>
    </div>
    <div class="col-md-6">
        <label for="scan_ktp_url_drive" class="form-label">KTP Scan</label>
        <div class="border border-dashed rounded p-3">
            <input type="file" class="form-control border-0" id="scan_ktp_url_drive" name="scan_ktp_url_drive">
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/registration-form.js') }}"></script>
@endpush
