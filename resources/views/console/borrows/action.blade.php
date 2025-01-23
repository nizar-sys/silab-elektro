<div class="d-flex align-items-center gap-2">
    <a href="javascript:;" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect delete-record"
        data-id="{{ $id }}" data-bs-toggle="tooltip" title="Delete User">
        <i class="ri-delete-bin-7-line ri-20px"></i>
    </a>
    <button class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect dropdown-toggle hide-arrow"
        data-bs-toggle="dropdown">
        <i class="ri-more-2-line ri-20px"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end m-0">
        @if ($status == 'pending')
            <form action="{{ route('borrows.action.handle', $id) }}" method="POST" class="d-inline">
                @csrf
                <input type="hidden" name="status" value="borrowed">
                <button type="submit" class="dropdown-item text-success">
                    <i class="ri-check-line me-2"></i><span>Setujui</span>
                </button>
            </form>
            <form action="{{ route('borrows.action.handle', $id) }}" method="POST" class="d-inline">
                @csrf
                <input type="hidden" name="status" value="rejected">
                <button type="submit" class="dropdown-item text-danger">
                    <i class="ri-close-line me-2"></i><span>Tolak</span>
                </button>
            </form>
        @elseif ($status == 'borrowed')
            <form action="{{ route('borrows.action.handle', $id) }}" method="POST" class="d-inline">
                @csrf
                <input type="hidden" name="status" value="returned">
                <button type="submit" class="dropdown-item">
                    <i class="ri-arrow-go-back-line me-2"></i><span>Kembalikan</span>
                </button>
            </form>
        @endif
        <a href="{{ route('borrows.edit', $id) }}" class="dropdown-item">
            <i class="ri-edit-box-line me-2"></i><span>Edit</span>
        </a>
        <a href="javascript:;" class="dropdown-item delete-record" data-id="{{ $id }}">
            <i class="ri-delete-bin-7-line me-2"></i><span>Delete</span>
        </a>
    </div>
</div>
