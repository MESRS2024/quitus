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
            array_merge(
                $this->communColumns(),
                $this->SitDepColumn(),
                $this->SitBfColumn(),
                $this->SitBcColumn(),
                $this->SitRuColumn(),
                $this->SitBrsColumn(),
                $this->printCertificateColumn()
            );
    }
}
