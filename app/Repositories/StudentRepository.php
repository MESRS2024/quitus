<?php

namespace App\Repositories;

use App\Models\Student;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Redis;

class StudentRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id_bac',
        'annee_bac',
        'matricule',
        'id_etudiant',
        'numero_matricule_etudiant',
        'id_dia',
        'numero_inscription',
        'id_annee_academique',
        'id_etablissement',
        'll_etablissement_arabe',
        'id_departement',
        'll_departement',
        'id_faculte',
        'll_faculte',
        'lc_domaine',
        'll_filiere',
        'll_filiere_arabe',
        'll_specialite',
        'll_specialite_arabe',
        'cycle',
        'niveau',
        'id_residence',
        'll_residence',
        'dou',
        'll_dou',
        'id_individu',
        'nom_latin',
        'nom_arabe',
        'prenom_latin',
        'prenom_arabe',
        'date_naissance',
        'prenom_mere_latin',
        'prenom_mere_arabe',
        'nom_mere_latin',
        'nom_mere_arabe',
        'lieu_naissance',
        'sit_dep',
        'sit_bf',
        'sit_bc',
        'sit_ru',
        'sit_brs'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Student::class;
    }

    public function cacheKey()
    {
        Redis::set('CachedData',true);
        Redis::set('dou',json_encode(['' => 'All']+$this->model::pluck('ll_dou', 'dou')->toArray()));
        Redis::set('cycle',json_encode(['' => 'All']+$this->model::pluck('cycle', 'cycle')->toArray()));
        Redis::set('niveau',json_encode(['' => 'All']+$this->model::pluck('niveau', 'niveau')->toArray()));
        Redis::set('residence',json_encode(['' => 'All']+$this->model::pluck('ll_residence', 'll_residence')->toArray()));
        Redis::set('domain',json_encode(['' => 'All']+$this->model::pluck('lc_domaine', 'lc_domaine')->toArray()));
        Redis::set('filiere',json_encode(['' => 'All']+$this->model::pluck('ll_filiere', 'll_filiere')->toArray()));
    }
}
