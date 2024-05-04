<?php

namespace App\Livewire;

use Laracasts\Flash\Flash;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\academicYear;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class AcademicYearsTable extends DataTableComponent
{
    protected $model = academicYear::class;

    protected $listeners = ['deleteRecord' => 'deleteRecord'];

    public function deleteRecord($id)
    {
        academicYear::find($id)->delete();
        Flash::success(__('messages.deleted', ['model' => __('models/academicYears.singular')]));
        $this->dispatch('refreshDatatable');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make(__('models/academicYears.fields.description'), "description")
                ->sortable()
                ->searchable(),
            booleanColumn::make(__('models/academicYears.fields.is_active'), "is_active")
                ->sortable()
                ->searchable(),
            Column::make(__('crud.actions'), 'id')
                ->format(
                    fn($value, $row, Column $column) => view('common.livewire-tables.actions', [
                        'showUrl' => route('academic-years.show', $row->id),
                        'editUrl' => route('academic-years.edit', $row->id),
                        'recordId' => $row->id,
                        'title' => $row->name,
                    ])
                )
        ];
    }
}
