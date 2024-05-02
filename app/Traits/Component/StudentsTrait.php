<?php
namespace App\Traits\Component;

use App\Jobs\PdfGeneration;
use App\Models\JobRecoder;
use App\Models\Student;
use App\Services\GeneratExonorationCertfcate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Redis;
use Laracasts\Flash\Flash;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Str;

trait StudentsTrait
{

    public function mount()
    {
        $this->bulkActions = match (session('activeRole')) {
            'QTC_SD' => [
                'exportPdfSelected' => __('Models/Students.Print_all_Certificates'),
            ],
            default => [
                'changeSelected' => __('Models/Students.Change_Selected'),
            ],
        };
    }
    private function getField($activeRole)
        {
            return match ($activeRole) {
                'QTC_DEP' => 'sit_dep',
                'QTC_BIB_FAC' => 'sit_bf',
                'QTC_BIB_CENT' => 'sit_bc',
                'QTC_RU' => 'sit_ru',
                'QTC_BRS' => 'sit_brs',
                default => '',
            };
        }
    public function changeSelected()
    {
        $field = $this->getField(session('activeRole'));
        foreach ($this->getSelected() as  $value) {
            $student = Student::find($value);
            $student->$field = !$student->$field;
            $student->save();
        }
        $this->clearSelected();
        Flash::success(__('messages.update', ['model' => __('models/students.plural')]));
        $this->dispatch('refreshDatatable');
    }

    public function deleteRecord($id)
    {
        Student::find($id)->delete();
        Flash::success(__('messages.deleted', ['model' => __('models/students.singular')]));
        $this->dispatch('refreshDatatable');
    }

    public function ChangeRecord($id,$field)
    {
        $student = Student::find($id);
        $student->$field = !$student->$field;
        $student->save();
        Flash::success(__('messages.deleted', ['model' => __('models/students.singular')]));
        $this->dispatch('refreshDatatable');
    }

    public function PrintCertificate($id)
    {
        $student = Student::find($id);
        $this->dispatch('refreshDatatable');
        return (new GeneratExonorationCertfcate([$student]))->generateForStudent();
    }

    public function exportPdfSelected()
    {
        $ids = $this->getSelected();
        $uuid = Str::uuid();
        $jobId = pdfGeneration::dispatch($ids, auth()->id(), $uuid)->onQueue('default') ;
        Flash::success(__('messages.update', ['model' => __('models/students.plural')]));

        JobRecoder::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'job_id'=> $uuid,
                'job_status' => 'pending'
            ]
        );
        session()->put('jobId', $uuid);
        $this->js('window.location.reload()');
    }

    public function filters(): array
    {
        $field = $this->getField(session('activeRole'));

        $filters = [
            SelectFilter::make(__('Models/Students.fields.ll_dou'), 'll_dou')
                ->options(Redis::get('dou'.auth()->id()) ? json_decode(Redis::get('dou'.auth()->id()), true) : [])
                ->filter(function (Builder $query, $value) {
                    return $query->where('dou', $value);
                }),
            SelectFilter::make(__('Models/Students.fields.ll_residence'), 'll_residence')
                ->options(Redis::get('residence'.auth()->id()) ? json_decode(Redis::get('residence'.auth()->id()), true) : [])
                ->filter(function (Builder $query, $value) {
                    return $query->where('id_residence', $value);
                }),

            SelectFilter::make(__('Models/Students.fields.ll_faculte'), 'll_faculte')
                ->options(Redis::get('faculte'.auth()->id()) ? json_decode(Redis::get('faculte'.auth()->id()), true) : [])
                ->filter(function (Builder $query, $value) {
                    return $query->where('id_faculte', $value);
                }),
            SelectFilter::make(__('Models/Students.fields.ll_departement'), 'll_departement')
                ->options(Redis::get('departement'.auth()->id()) ? json_decode(Redis::get('departement'.auth()->id()), true) : [])
                ->filter(function (Builder $query, $value) {
                    return $query->where('id_departement', $value);
                }),
            SelectFilter::make(__('Models/Students.fields.lc_domaine'), 'lc_domaine')
                ->options(Redis::get('domain'.auth()->id()) ? json_decode(Redis::get('domain'.auth()->id()), true) : [])
                ->filter(function (Builder $query, $value) {
                    return $query->where('lc_domaine', $value);
                }),
            SelectFilter::make(__('Models/Students.fields.ll_filiere'), 'll_filiere')
                ->options(redis::get('filiere'.auth()->id()) ? json_decode(redis::get('filiere'.auth()->id()), true) : [])
                ->filter(function (Builder $query, $value) {
                    return $query->where('ll_filiere', $value);
                }),
            SelectFilter::make(__('Models/Students.fields.cycle'), 'cycle')
                ->options(redis::get('cycle'.auth()->id()) ? json_decode(redis::get('cycle'.auth()->id()), true) : [])
                ->filter(function (Builder $query, $value) {
                    return $query->where('cycle', $value);
                }),

            SelectFilter::make(__('Models/Students.fields.niveau'), 'niveau')
                ->options(redis::get('niveau'.auth()->id()) ? json_decode(redis::get('niveau'.auth()->id()), true) : [])
                ->filter(function (Builder $query, $value) {
                    return $query->where('niveau', $value);
                }),
        ];

        if (session('activeRole') != 'QTC_SD')
            $filters[] = SelectFilter::make('Situation')
                ->options([
                    ''=> 'All',
                    '1' => 'Exonerated',
                    '0' => 'Not Exonerated'
                ])
                ->filter(function (Builder $query, $value) use ($field) {
                    return $query->where($field, $value);
                });

        return $filters;

    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->bulkActionsAreEnabled();
        $this->setLoadingPlaceholderEnabled();
        $this->setPerPageAccepted([10, 25, 50, 100]);
        $this->setFilterLayoutSlideDown();

    }

    public function communColumns ():array{
        return [
            Column::make("id", "id")
                ->sortable()
                ->searchable(),
            Column::make(__('Models/Students.fields.numero_inscription'), "numero_inscription")
                ->searchable(),
            Column::make(__('Models/Students.fields.nom_latin'), "nom_latin")
                ->searchable(),
            Column::make(__('Models/Students.fields.prenom_latin'), "prenom_latin")
                ->searchable(),
            Column::make(__('Models/Students.fields.nom_arabe'), "nom_arabe")
                ->searchable(),
            Column::make(__('Models/Students.fields.prenom_arabe'), "prenom_arabe")
                ->searchable(),
            Column::make(__('Models/Students.fields.date_naissance'), "date_naissance")
                ->format(function ($value) {
                    return $value->format('d/m/Y');
                })
                ->searchable(),
            Column::make(__('Models/Students.fields.ll_specialite'), "ll_specialite")
                    ->searchable()
   ];

    }


    private function SitDepColumn()
    {
        if ((session('activeRole') == 'QTC_DEP') || session('activeRole') == 'QTC_SD') {
            return [Column::make(__('Models/Students.fields.sit_dep'), "sit_dep")
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
                )];
        }
        return [];
    }
    private function SitBfColumn()
    {
        if (session('activeRole') == 'QTC_BIB_FAC' || session('activeRole') == 'QTC_SD'){
            return [Column::make(__('Models/Students.fields.sit_bf'), "sit_bf")
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
                )];
        }
        return [];
    }

    private function SitBcColumn()
    {

        if ((session('activeRole') == 'QTC_BIB_CENT') || (session('activeRole') == 'QTC_SD')){
            return [Column::make(__('Models/Students.fields.sit_bc'), "sit_bc")
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
                )];
        }
        return [];
    }

    private function SitRuColumn()
    {
        if (session('activeRole') == 'QTC_RU' || session('activeRole') == 'QTC_SD'){
            return [Column::make(__('Models/Students.fields.sit_ru'), "sit_ru")
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
                )];
        }
        return [];
    }

    private function SitBrsColumn()
    {
        if (session('activeRole') == 'QTC_BRS' || session('activeRole') == 'QTC_SD'){
            return [Column::make(__('Models/Students.fields.sit_brs'), "sit_brs")
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
                )];
        }
        return [];
    }


    public function printCertificateColumn()
    {
        if (session('activeRole') == 'QTC_SD'){
        return [Column::make(__('Crud.print'), "id")
            ->format(
                fn($value, $row, Column $column) => view(
                    'common.livewire-tables.print-certificate',
                    [
                        'value' => __('Crud.print_certificate'),
                        'color' => 'primary',
                        'recordId' => $row->id,
                        'field'=> 'sit_brs'
                    ]
                )
            )];
        }
        return [];
    }


}
