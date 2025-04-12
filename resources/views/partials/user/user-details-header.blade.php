<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>User Details</h4>
    <div>
        <a href="{{ route('userstory.edit', $UserStories->id) }}" class="btn btn-primary">
            <i class="bi bi-pencil-square"></i> Edit
        </a>
        <a href="{{ route('userstory.index') }}" class="btn btn-secondary ms-2">
            <i class="bi bi-arrow-left"></i> Back to List
        </a>
    </div>
</div>
