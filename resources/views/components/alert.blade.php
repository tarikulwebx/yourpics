@if (session('success'))
    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
        <i class="fa-regular fa-circle-check me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close small shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-triangle-exclamation me-2"></i>
        {{ session('warning') }}
        <button type="button" class="btn-close small shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-triangle-exclamation me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close small shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->all())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <div>
            <strong>Please, fix following errors: </strong>
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="btn-close small shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
