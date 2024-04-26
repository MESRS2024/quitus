<div class='btn-group'>
    @permission('view.mails')
    <a href="#popUp" href="{{ $showUrl }}"
       class='btn btn-default  ' onclick="loadeditform('{{ $showUrl }}', '  {{__('crud.show') . ' ' . $title }}')">
        <i class="fa fa-eye"></i>  @lang('models/mails.button.view')
    </a>
    @endpermission

    @permission('process.mails')
    <a href="#popUp" href="{{ $processingUrl }}"
       class='btn btn-warning  ' onclick="loadeditform('{{ $processingUrl }}', '  {{__('crud.process') . ' ' . $title }}')">
        <i class="fa fa-user-cog"></i>  @lang('models/mails.button.process')
    </a>
    @endpermission
</div>
