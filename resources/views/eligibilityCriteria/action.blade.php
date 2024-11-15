<div class="dropdown">
    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
        <i class="bx bx-dots-vertical-rounded"></i>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('eligibility.criteria.edit', $query->id) }}">
            <i class="bx bx-edit-alt me-2"></i>
                {{__('buttons.edit')}}
            </a>

        <form action="{{ route('eligibility.criteria.destroy', $query->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="dropdown-item">
                <i class="bx bx-trash-alt me-2"></i>
                {{ __('buttons.delete') }}
            </button>
        </form>
    </div>
</div>
