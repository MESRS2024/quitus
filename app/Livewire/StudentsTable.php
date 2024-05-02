<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Student;
use App\Traits\Component\StudentsTrait;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class StudentsTable extends DataTableComponent
{
    use StudentsTrait;

    protected $model = Student::class;

    protected $listeners = ['deleteRecord' => 'deleteRecord', 'changeRecord' => 'ChangeRecord'];

    public array $bulkActions = [
        'changeSelected' => 'Change Selected',
        'exportPdfSelected' => 'Print all Certificates',
    ];
    public function columns(): array
    {

        return
            array_merge(
                $this->communColumns(),
                $this->SitDepColumn(),
                $this->SitBfColumn(),
                $this->SitBcColumn(),
                $this->SitRuColumn(),
                $this->SitBrsColumn()
            );
    }

}
