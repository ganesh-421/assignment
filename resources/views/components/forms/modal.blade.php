@props(['modalId', 'title'])
<div class="modal fade container" id="{{ $modalId }}" tabindex="-1" aria-labelledby="updateModalLabel"
    aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog p-3">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">{{ $title }}</h5>
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"
                    id="c-{{ $modalId }}"></button>
            </div>
            {{ $slot }}
        </div>
    </div>
</div>
