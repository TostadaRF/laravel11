@if (session('success'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="field-success" class="toast bg-success show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-light">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="field-error" class="toast bg-danger show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Error</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-light">
                {{ session('error') }}
            </div>
        </div>
    </div>
@endif

@if (session('warning'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="field-alert" class="toast bg-warning show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Atención</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-light">
                {{session('warning') }}
            </div>
        </div>
    </div>
@endif

@if (session('info'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="field-info" class="toast bg-info show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Info</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-light">
                {{ session('info') }}
            </div>
        </div>
    </div>
@endif

