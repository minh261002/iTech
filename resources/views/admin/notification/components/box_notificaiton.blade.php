@forelse($notifications as $noty)
    <div class="card-body border notification-item box-noty-{{ $noty->id }} d-block mt-1 rounded {{ $noty->is_read == 1 ? 'bg-light' : 'border' }}"
        data-notification-id="{{ $noty->id }}" style="cursor: pointer">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center notification-item-{{ $noty->id }}">
                <div class="flex-shrink-0">
                    <i class="fa-solid fa-bell text-success" style="font-size: 32px"></i>
                </div>
                <div class="flex-grow-1 ms-3 text-truncate">
                    <h6 class="my-0 fw-medium text-dark fs-15">
                        {{ $noty->title }}
                    </h6>
                    <small class="text-muted fs-13 fw-medium mb-0">
                        {{ format_datetime($noty->created_at) }}
                    </small>
                </div>
            </div>

            <div class="delete-notification " data-notyId="{{ $noty->id }}">
                <button class="btn btn-sm btn-danger rounded-circle">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
@empty
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div class="flex-grow-1 ms-3 text-truncate">
                <h6 class="my-0 fw-medium text-dark fs-15">Không có thông báo nào</h6>
            </div>
        </div>
    </div>
@endforelse
