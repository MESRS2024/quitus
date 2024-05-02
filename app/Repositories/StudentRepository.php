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
        if(Redis::get('CachedData'.auth()->id()) == true){
            return;
        }
        Redis::set('faculte'.auth()->id(),json_encode(['' => 'All']+$this->model()::pluck('ll_faculte', 'id_faculte')->toArray()));
        Redis::set('departement'.auth()->id(),json_encode(['' => 'All']+$this->model()::pluck('ll_departement', 'id_departement')->toArray()));
        Redis::set('dou'.auth()->id(),json_encode(['' => 'All']+$this->model()::pluck('ll_dou', 'dou')->toArray()));
        Redis::set('cycle'.auth()->id(),json_encode(['' => 'All']+$this->model()::pluck('cycle', 'cycle')->toArray()));
        Redis::set('niveau'.auth()->id(),json_encode(['' => 'All']+$this->model()::pluck('niveau', 'niveau')->toArray()));
        Redis::set('residence'.auth()->id(),json_encode(['' => 'All']+$this->model()::pluck('ll_residence', 'id_residence')->toArray()));
        Redis::set('domain'.auth()->id(),json_encode(['' => 'All']+$this->model()::pluck('lc_domaine', 'lc_domaine')->toArray()));
        Redis::set('filiere'.auth()->id(),json_encode(['' => 'All']+$this->model()::pluck('ll_filiere', 'll_filiere')->toArray()));
        Redis::set('CachedData'.auth()->id(),true);
    }
}
