@props(['id', 'title', 'body', 'footer', 'class', 'size'])

{{-- 
<div class="modal fade {{ $class ?? '' }}" id="{{ $id }}" tabindex="-1" role="dialog"
    aria-labelledby="{{ $id }}-title" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered {{ $size ?? '' }}" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ Str::slug($title) }}-title">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $body }}
            </div>
            <div class="modal-footer">
                {{ $footer }}
            </div>
        </div>
    </div>
</div> --}}

<div class="modal" id="{{ $id }}">
    <div class="modal-dialog {{ $size ?? '' }}">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{ $title }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                {{ $body }}
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                {{ $footer }}
            </div>
        </div>
    </div>
</div>
