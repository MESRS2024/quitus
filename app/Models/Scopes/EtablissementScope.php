<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class EtablissementScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     * 214    QTC_DEP    Gestion des acquittements departement
     * 215    QTC_BIB_FAC    Gestion des acquittements bibliothèque faculté
     * 217    QTC_RU    Gestion des acquittements résidence universitaire
     * 218    QTC_BRS    Gestion des acquittements DOU
     * 219    QTC_SD    Gestion des acquittements service des diplômes
     * 216    QTC_BIB_CENT    Gestion des acquittements bibliothèque centrale
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('id_annee_academique', session('activeAcademicYear'));
        switch (session('activeRole')) {
            case 'QTC_BIB_CENT':
                    $builder->where('id_etablissement', session('group_id'));
                break;
            case 'QTC_SD':
                $builder->where('id_faculte', session('strecture_id'));
                break;
            case 'QTC_DEP': //Gestion des acquittements departement
                $builder->where('id_departement', session('strecture_id'));
                break;
            case 'QTC_BIB_FAC': //Gestion des acquittements bibliothèque faculté
                $builder->where('id_faculte', session('strecture_id'));
                break;
            case 'QTC_RU': //Gestion des acquittements résidence universitaire
                $builder->where('id_residence', session('strecture_id'));
                break;
            case 'QTC_BRS': //Gestion des acquittements DOU
                $builder->where('dou', session('group_id'));
                break;
            default:
                break;
        }
        // $builder->where('id_departement', session('strecture_id'));
        //$builder->where('id_faculte', session('strecture_id'));
        // $builder->where('id_residence', session('strecture_id'));
        // $builder->where('dou', session('strecture_id'));
    }
}
