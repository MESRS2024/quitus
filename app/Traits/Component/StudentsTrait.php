<?php
namespace App\Traits\Component;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Redis;
use Laracasts\Flash\Flash;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

trait StudentsTrait
{

    public function changeSelected()
    {
        //TODO : Change the field name according to the user Role
        $field = 'sit_dep';
        foreach ($this->getSelected() as  $value) {
            $student = Student::find($value);
            $student->$field = !$student->$field;
            $student->save();
        }
        $this->clearSelected();
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

    public function filters(): array
    {
        return [
            SelectFilter::make('Dou')
                ->options(Redis::get('dou') ? json_decode(Redis::get('dou'), true) : [])
                ->filter(function (Builder $query, $value) {
                    return $query->where('dou', $value);
                }),
            SelectFilter::make('Residence')
                ->options(Redis::get('residence') ? json_decode(Redis::get('residence'), true) : [])
                ->filter(function (Builder $query, $value) {
                    return $query->where('id_residence', $value);
                }),
            SelectFilter::make('Domain')
                ->options(Redis::get('domain') ? json_decode(Redis::get('domain'), true) : [])
                ->filter(function (Builder $query, $value) {
                    return $query->where('lc_domaine', $value);
                }),
            SelectFilter::make('Filiere')
                ->options(redis::get('filiere') ? json_decode(redis::get('filiere'), true) : [])
                ->filter(function (Builder $query, $value) {
                    return $query->where('ll_filiere', $value);
                }),
            SelectFilter::make('Cycle')
                ->options(redis::get('cycle') ? json_decode(redis::get('cycle'), true) : [])
                ->filter(function (Builder $query, $value) {
                    return $query->where('cycle', $value);
                }),

            SelectFilter::make('Niveau')
                ->options(redis::get('niveau') ? json_decode(redis::get('niveau'), true) : [])
                ->filter(function (Builder $query, $value) {
                    return $query->where('niveau', $value);
                }),
        ];

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
            Column::make("#", "id")
                ->sortable()
                ->searchable(),
            Column::make("Annee Bac", "annee_bac")
                ->sortable()
                ->searchable(),
            Column::make("Matricule", "matricule")
                ->sortable()
                ->searchable(),
            Column::make("Numero Inscription", "numero_inscription")
                ->sortable()
                ->searchable(),
            Column::make("Ll Etablissement Arabe", "ll_etablissement_arabe")
                ->sortable()
                ->searchable(),
            Column::make("Ll Departement", "ll_departement")
                ->sortable()
                ->searchable(),
            Column::make("Ll Faculte", "ll_faculte")
                ->sortable()
                ->searchable(),
            Column::make("Lc Domaine", "lc_domaine")
                ->sortable()
                ->searchable(),
            Column::make("Ll Filiere", "ll_filiere")
                ->sortable()
                ->searchable(),
            Column::make("Ll Specialite", "ll_specialite")
                ->sortable()
                ->searchable(),
            Column::make("Cycle", "cycle")
                ->sortable()
                ->searchable(),
            Column::make("Niveau", "niveau")
                ->sortable()
                ->searchable(),
            Column::make("Ll Residence", "ll_residence")
                ->sortable()
                ->searchable(),
            Column::make("Dou", "dou")
                ->sortable()
                ->searchable(),
            Column::make("Ll Dou", "ll_dou")
                ->sortable()
                ->searchable(),
            Column::make("Nom Latin", "nom_latin")
                ->sortable()
                ->searchable(),
            Column::make("Prenom Latin", "prenom_latin")
                ->sortable()
                ->searchable()];
    }

}
