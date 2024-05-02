@if(session('activeRole') == 'QTC_SD')
    <div class="justify-content-center">
        <span >
            <h3 class="badge badge-{{ $color ?? 'primary' }} p-3">{{ $value }}</h3>
        </span>
    </div>
@else
    <div class="justify-content-center">
        <a wire:click="ChangeRecord({{ $recordId }},'{{ $field }}')"
           onclick="confirm('Are you sure you want to exonerate this students?') || event.stopImmediatePropagation()">
            <h3 class="badge badge-{{ $color ?? 'primary' }} p-3">{{ $value }}</h3>
        </a>
    </div>

@endif
