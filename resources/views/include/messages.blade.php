@if (session('success'))
    <div class="alert alert-success mb-4">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger mb-4">{{ session('error') }}</div>
@endif
