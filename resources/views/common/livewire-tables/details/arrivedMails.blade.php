<div class='btn-group'>
    @permission('view.mails')
    <a href="#popUp" href="{{ $showUrl }}"
       class='btn btn-default ' onclick="loadeditform('{{ $showUrl }}', '  {{__('crud.show') . ' ' . $title }}')">
        <i class="fa fa-eye"></i>  @lang('models/mails.button.view')
    </a>
    @endpermission

    @permission('record.mails')
    <a href="#popUp" href="{{ $recordUrl }}"
       class='btn btn-success ' onclick="loadeditform('{{ $recordUrl }}', '  {{__('crud.record') . ' ' . $title }}')">
        <i class="fa fa-registered"></i>  @lang('models/mails.button.record')
    </a>
    @endpermission

</div>
