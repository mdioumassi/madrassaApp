@props(['id', 'title', 'body', 'footer', 'class', 'size'])
<div class="modal" id="{{ $id }}">
    <div class="modal-dialog {{ $size ?? '' }}">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-success text-light">
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
