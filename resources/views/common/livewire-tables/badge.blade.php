<div class="justify-content-center">
    <a wire:click="ChangeRecord({{ $recordId }},'{{ $field }}')"
       onclick="confirm('Are you sure you want to remove this students?') || event.stopImmediatePropagation()">
        <h3 class="badge badge-{{ $color ?? 'primary' }} p-3">{{ $value }}</h3>
    </a>
</div>
