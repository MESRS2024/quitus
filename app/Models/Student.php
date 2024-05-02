<?php

namespace App\Models;

use App\Models\Scopes\EtablissementScope;
use App\Observers\StudentObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;


 #[ScopedBy(EtablissementScope::class)]
 #[ObservedBy(StudentObserver::class)]

 class Student extends Model
{
    use HasFactory;
    public $table = 'students';

    public $fillable = [
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

    protected $casts = [
        'annee_bac' => 'string',
        'matricule' => 'string',
        'numero_matricule_etudiant' => 'string',
        'numero_inscription' => 'string',
        'll_etablissement_arabe' => 'string',
        'll_departement' => 'string',
        'll_faculte' => 'string',
        'lc_domaine' => 'string',
        'll_filiere' => 'string',
        'll_filiere_arabe' => 'string',
        'll_specialite' => 'string',
        'll_specialite_arabe' => 'string',
        'cycle' => 'string',
        'niveau' => 'string',
        'll_residence' => 'string',
        'll_dou' => 'string',
        'nom_latin' => 'string',
        'nom_arabe' => 'string',
        'prenom_latin' => 'string',
        'prenom_arabe' => 'string',
        'date_naissance' => 'date',
        'prenom_mere_latin' => 'string',
        'prenom_mere_arabe' => 'string',
        'nom_mere_latin' => 'string',
        'nom_mere_arabe' => 'string',
        'lieu_naissance' => 'string'
    ];

    public static array $rules = [
        'id_bac' => 'nullable',
        'annee_bac' => 'nullable|string|max:10',
        'matricule' => 'nullable|string|max:15',
        'id_etudiant' => 'nullable',
        'numero_matricule_etudiant' => 'nullable|string|max:25',
        'id_dia' => 'nullable',
        'numero_inscription' => 'nullable|string',
        'id_annee_academique' => 'nullable',
        'id_etablissement' => 'nullable',
        'll_etablissement_arabe' => 'nullable|string|max:250',
        'id_departement' => 'nullable',
        'll_departement' => 'nullable|string|max:255',
        'id_faculte' => 'nullable',
        'll_faculte' => 'nullable|string|max:255',
        'lc_domaine' => 'nullable|string|max:100',
        'll_filiere' => 'nullable|string|max:65535',
        'll_filiere_arabe' => 'nullable|string|max:65535',
        'll_specialite' => 'nullable|string|max:65535',
        'll_specialite_arabe' => 'nullable|string|max:65535',
        'cycle' => 'nullable|string|max:150',
        'niveau' => 'nullable|string|max:5',
        'id_residence' => 'nullable',
        'll_residence' => 'nullable|string|max:250',
        'dou' => 'nullable',
        'll_dou' => 'nullable|string|max:250',
        'id_individu' => 'nullable',
        'nom_latin' => 'nullable|string|max:50',
        'nom_arabe' => 'nullable|string|max:50',
        'prenom_latin' => 'nullable|string|max:50',
        'prenom_arabe' => 'nullable|string|max:50',
        'date_naissance' => 'nullable',
        'prenom_mere_latin' => 'nullable|string|max:50',
        'prenom_mere_arabe' => 'nullable|string|max:50',
        'nom_mere_latin' => 'nullable|string|max:50',
        'nom_mere_arabe' => 'nullable|string|max:50',
        'lieu_naissance' => 'nullable|string',
        'sit_dep' => 'nullable',
        'sit_bf' => 'nullable',
        'sit_bc' => 'nullable',
        'sit_ru' => 'nullable',
        'sit_brs' => 'nullable'
    ];




     public function sit_bc_updated_by()
     {
            return $this->belongsTo(User::class, 'sit_bc_updatedBy');
     }
     public function sit_bf_updated_by()
     {
            return $this->belongsTo(User::class, 'sit_bf_updatedBy');
     }
     public function sit_dep_updated_by()
     {
            return $this->belongsTo(User::class, 'sit_dep_updatedBy');
     }
     public function sit_ru_updated_by()
     {
            return $this->belongsTo(User::class, 'sit_ru_updatedBy');
     }
     public function sit_brs_updated_by()
     {
            return $this->belongsTo(User::class, 'sit_brs_updatedBy');
     }




 }
