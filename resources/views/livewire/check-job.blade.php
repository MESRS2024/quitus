<div
    @if($status != 'success')
            wire:poll="updadeStatus"
    @endif
>
{{-- The Master doesn't talk, he acts. --}}
@if($status != 'not found')
    <h3 wire:model="status" class="alert alert-{{ $status == 'pending' ? 'warning' : ($status == 'success' ? 'success' : 'danger') }}">
        {{ $messages }}
        <a href="{{ $url }}" target="_blank" class="btn btn-primary
            @if(App::getLocale() == 'ar') float-left @else float-right @endif
        ">
           <i class="fa fa-download"></i> View Document
        </a>
    </h3>
@endif
</div>
