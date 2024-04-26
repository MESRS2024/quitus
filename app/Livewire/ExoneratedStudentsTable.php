<?php

namespace App\Livewire;

use App\Models\Student;
use App\Traits\Component\StudentsTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ExoneratedStudentsTable  extends DataTableComponent
{
    use StudentsTrait;

    protected $model = Student::class;

    protected $listeners = ['deleteRecord' => 'deleteRecord', 'changeRecord' => 'ChangeRecord'];

    public array $bulkActions = [
        'changeSelected' => 'Change Selected',
    ];


    public function builder(): Builder
    {
            return $this->model::query()
                ->where('sit_dep', 1)
                ->where('sit_bf', 1)
                ->where('sit_bc', 1)
                ->where('sit_ru', 1)
                ->where('sit_brs', 1);
    }

    public function columns(): array
    {
        return
            array_merge($this->communColumns(),
                [
                    Column::make("Sit Dep", "sit_dep")
                        ->format(
                            fn($value, $row, Column $column) => view(
                                'common.livewire-tables.badge',
                                [
                                    'value' => ($value) ? 'Oui' : 'Non',
                                    'color' => ($value) ? 'success' : 'danger',
                                    'recordId' => $row->id,
                                    'field'=> 'sit_dep'
                                ]
                            )
                        ),
                    Column::make("Sit Bf", "sit_bf")
                        ->format(
                            fn($value, $row, Column $column) => view(
                                'common.livewire-tables.badge',
                                [
                                    'value' => ($value) ? 'Oui' : 'Non',
                                    'color' => ($value) ? 'success' : 'danger',
                                    'recordId' => $row->id,
                                    'field'=> 'sit_bf'
                                ]
                            )
                        ),
                    Column::make("Sit Bc", "sit_bc")
                        ->format(
                            fn($value, $row, Column $column) => view(
                                'common.livewire-tables.badge',
                                [
                                    'value' => ($value) ? 'Oui' : 'Non',
                                    'color' => ($value) ? 'success' : 'danger',
                                    'recordId' => $row->id,
                                    'field'=> 'sit_bc'
                                ]
                            )
                        ),
                    Column::make("Sit Ru", "sit_ru")
                        ->format(
                            fn($value, $row, Column $column) => view(
                                'common.livewire-tables.badge',
                                [
                                    'value' => ($value) ? 'Oui' : 'Non',
                                    'color' => ($value) ? 'success' : 'danger',
                                    'recordId' => $row->id,
                                    'field'=> 'sit_ru'
                                ]
                            )
                        ),
                    Column::make("Sit Brs", "sit_brs")
                        ->format(
                            fn($value, $row, Column $column) => view(
                                'common.livewire-tables.badge',
                                [
                                    'value' => ($value) ? 'Oui' : 'Non',
                                    'color' => ($value) ? 'success' : 'danger',
                                    'recordId' => $row->id,
                                    'field'=> 'sit_brs'
                                ]
                            )
                        )
                ]);
    }
}
