{{-- Success Toast --}}
<div class="toast-container position-fixed bottom-0 start-0 p-3">
    <div id="successToast" class="toast  text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex align-items-center">
            <div class="toast-body fw-semibold d-flex">
                <div><i class="fa-regular fa-circle-check me-2 flex-row"></i></div>
                <div class="toastMessage">...</div>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>


{{-- Failed Toast --}}
<div class="toast-container position-fixed bottom-0 start-0 p-3">
    <div id="failedToast" class="toast  text-bg-danger border-0" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="d-flex align-items-center">
            <div class="toast-body fw-semibold d-flex">
                <div><i class="fa-regular fa-circle-check me-2 flex-row"></i></div>
                <div class="toastMessage">...</div>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>

{{-- Warning Toast --}}
<div class="toast-container position-fixed bottom-0 start-0 p-3">
    <div id="warningToast" class="toast  text-bg-warning border-0" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="d-flex align-items-center">
            <div class="toast-body fw-semibold d-flex">
                <div><i class="fa-solid fa-triangle-exclamation me-2 flex-row"></i></div>
                <div class="toastMessage">...</div>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
