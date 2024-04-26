<div class='btn-group'>
    @permission('view.mails')
    <a href="#popUp" href="{{ $showUrl }}"
       class='btn btn-default ' onclick="loadeditform('{{ $showUrl }}', '  {{__('crud.show') . ' ' . $title }}')">
        <i class="fa fa-eye"></i>  @lang('models/mails.button.view')
    </a>
    @endpermission

    @permission('dispatch.mails')
    <a href="#popUp" href="{{ $SendProcessingUrl }}"
       class='btn btn-danger ' onclick="loadeditform('{{$SendProcessingUrl }}', '  {{__('crud.process') . ' ' . $title }}')">
        <i class="fa fa-mail-forward"></i>  @lang('models/mails.button.dispatch')
    </a>
    @endpermission
</div>
