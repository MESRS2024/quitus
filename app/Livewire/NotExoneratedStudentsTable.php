<?php

namespace App\Livewire;

use App\Models\Student;
use App\Traits\Component\StudentsTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class NotExoneratedStudentsTable  extends DataTableComponent
{
    use StudentsTrait;

    protected $model = Student::class;

    protected $listeners = ['deleteRecord' => 'deleteRecord', 'changeRecord' => 'ChangeRecord'];


    public function builder(): Builder
    {
        return $this->model::query()
            ->whereRaw(DB::raw("(sit_bc != 1 or sit_bf != 1 or sit_brs != 1 or sit_dep != 1 or sit_ru != 1)"));

    }
    public function columns(): array
    {

        return
            array_merge(
                $this->communColumns(),
                $this->SitDepColumn(),
                $this->SitBfColumn(),
                $this->SitBcColumn(),
                $this->SitRuColumn(),
                $this->SitBrsColumn(),

            );
    }

}
