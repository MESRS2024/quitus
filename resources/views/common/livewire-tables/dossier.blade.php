
<div class='btn-group'>
    @permission('view.dossiers')
    <a href="#popUp" href="{{ $editUrl }}"
       class='btn btn-default btn-xs' onclick="loadeditform('{{ $showUrl }}', '  {{__('crud.show') . ' ' . $title }}')">
        <i class="fa fa-eye"></i>
    </a>
    @endpermission

    @permission('edit.dossiers')
    <a href="#popUp" href="{{ $editUrl }}"
       class='btn btn-default btn-xs' onclick="loadeditform('{{ $editUrl }}', '{{__('crud.edit') . ' ' . $title }}')">
        <i class="fa fa-edit"></i>
    </a>

    @endpermission
    @permission('delete.dossiers')
    <a class='btn btn-danger btn-xs' wire:click="deleteRecord({{ $recordId }})"
       onclick="confirm('Are you sure you want to remove this Record?') || event.stopImmediatePropagation()">
        <i class="fa fa-trash"></i>
    </a>
    @endpermission
</div>
