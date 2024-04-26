<!-- Id Bac Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_bac', __('models/students.fields.id_bac').':') !!}
    {!! Form::number('id_bac', null, ['class' => 'form-control']) !!}
</div>

<!-- Annee Bac Field -->
<div class="form-group col-sm-6">
    {!! Form::label('annee_bac', __('models/students.fields.annee_bac').':') !!}
    {!! Form::text('annee_bac', null, ['class' => 'form-control', 'maxlength' => 10, 'maxlength' => 10]) !!}
</div>

<!-- Matricule Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matricule', __('models/students.fields.matricule').':') !!}
    {!! Form::text('matricule', null, ['class' => 'form-control', 'maxlength' => 15, 'maxlength' => 15]) !!}
</div>

<!-- Id Etudiant Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_etudiant', __('models/students.fields.id_etudiant').':') !!}
    {!! Form::number('id_etudiant', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Matricule Etudiant Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_matricule_etudiant', __('models/students.fields.numero_matricule_etudiant').':') !!}
    {!! Form::text('numero_matricule_etudiant', null, ['class' => 'form-control', 'maxlength' => 25, 'maxlength' => 25]) !!}
</div>

<!-- Id Dia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_dia', __('models/students.fields.id_dia').':') !!}
    {!! Form::number('id_dia', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Inscription Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('numero_inscription', __('models/students.fields.numero_inscription').':') !!}
    {!! Form::textarea('numero_inscription', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Annee Academique Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_annee_academique', __('models/students.fields.id_annee_academique').':') !!}
    {!! Form::number('id_annee_academique', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Etablissement Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_etablissement', __('models/students.fields.id_etablissement').':') !!}
    {!! Form::number('id_etablissement', null, ['class' => 'form-control']) !!}
</div>

<!-- Ll Etablissement Arabe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ll_etablissement_arabe', __('models/students.fields.ll_etablissement_arabe').':') !!}
    {!! Form::text('ll_etablissement_arabe', null, ['class' => 'form-control', 'maxlength' => 250, 'maxlength' => 250]) !!}
</div>

<!-- Id Departement Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_departement', __('models/students.fields.id_departement').':') !!}
    {!! Form::number('id_departement', null, ['class' => 'form-control']) !!}
</div>

<!-- Ll Departement Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ll_departement', __('models/students.fields.ll_departement').':') !!}
    {!! Form::text('ll_departement', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Id Faculte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_faculte', __('models/students.fields.id_faculte').':') !!}
    {!! Form::number('id_faculte', null, ['class' => 'form-control']) !!}
</div>

<!-- Ll Faculte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ll_faculte', __('models/students.fields.ll_faculte').':') !!}
    {!! Form::text('ll_faculte', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Lc Domaine Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lc_domaine', __('models/students.fields.lc_domaine').':') !!}
    {!! Form::text('lc_domaine', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Ll Filiere Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('ll_filiere', __('models/students.fields.ll_filiere').':') !!}
    {!! Form::textarea('ll_filiere', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Ll Filiere Arabe Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('ll_filiere_arabe', __('models/students.fields.ll_filiere_arabe').':') !!}
    {!! Form::textarea('ll_filiere_arabe', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Ll Specialite Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('ll_specialite', __('models/students.fields.ll_specialite').':') !!}
    {!! Form::textarea('ll_specialite', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Ll Specialite Arabe Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('ll_specialite_arabe', __('models/students.fields.ll_specialite_arabe').':') !!}
    {!! Form::textarea('ll_specialite_arabe', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Cycle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cycle', __('models/students.fields.cycle').':') !!}
    {!! Form::text('cycle', null, ['class' => 'form-control', 'maxlength' => 150, 'maxlength' => 150]) !!}
</div>

<!-- Niveau Field -->
<div class="form-group col-sm-6">
    {!! Form::label('niveau', __('models/students.fields.niveau').':') !!}
    {!! Form::text('niveau', null, ['class' => 'form-control', 'maxlength' => 5, 'maxlength' => 5]) !!}
</div>

<!-- Id Residence Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_residence', __('models/students.fields.id_residence').':') !!}
    {!! Form::number('id_residence', null, ['class' => 'form-control']) !!}
</div>

<!-- Ll Residence Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ll_residence', __('models/students.fields.ll_residence').':') !!}
    {!! Form::text('ll_residence', null, ['class' => 'form-control', 'maxlength' => 250, 'maxlength' => 250]) !!}
</div>

<!-- Dou Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dou', __('models/students.fields.dou').':') !!}
    {!! Form::number('dou', null, ['class' => 'form-control']) !!}
</div>

<!-- Ll Dou Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ll_dou', __('models/students.fields.ll_dou').':') !!}
    {!! Form::text('ll_dou', null, ['class' => 'form-control', 'maxlength' => 250, 'maxlength' => 250]) !!}
</div>

<!-- Id Individu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_individu', __('models/students.fields.id_individu').':') !!}
    {!! Form::number('id_individu', null, ['class' => 'form-control']) !!}
</div>

<!-- Nom Latin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_latin', __('models/students.fields.nom_latin').':') !!}
    {!! Form::text('nom_latin', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Nom Arabe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_arabe', __('models/students.fields.nom_arabe').':') !!}
    {!! Form::text('nom_arabe', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Prenom Latin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom_latin', __('models/students.fields.prenom_latin').':') !!}
    {!! Form::text('prenom_latin', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Prenom Arabe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom_arabe', __('models/students.fields.prenom_arabe').':') !!}
    {!! Form::text('prenom_arabe', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Date Naissance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_naissance', __('models/students.fields.date_naissance').':') !!}
    {!! Form::text('date_naissance', null, ['class' => 'form-control','id'=>'date_naissance']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_naissance').datepicker()
    </script>
@endpush

<!-- Prenom Mere Latin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom_mere_latin', __('models/students.fields.prenom_mere_latin').':') !!}
    {!! Form::text('prenom_mere_latin', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Prenom Mere Arabe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom_mere_arabe', __('models/students.fields.prenom_mere_arabe').':') !!}
    {!! Form::text('prenom_mere_arabe', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Nom Mere Latin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_mere_latin', __('models/students.fields.nom_mere_latin').':') !!}
    {!! Form::text('nom_mere_latin', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Nom Mere Arabe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_mere_arabe', __('models/students.fields.nom_mere_arabe').':') !!}
    {!! Form::text('nom_mere_arabe', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Lieu Naissance Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('lieu_naissance', __('models/students.fields.lieu_naissance').':') !!}
    {!! Form::textarea('lieu_naissance', null, ['class' => 'form-control']) !!}
</div>

<!-- Sit Dep Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sit_dep', __('models/students.fields.sit_dep').':') !!}
    {!! Form::number('sit_dep', null, ['class' => 'form-control']) !!}
</div>

<!-- Sit Bf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sit_bf', __('models/students.fields.sit_bf').':') !!}
    {!! Form::number('sit_bf', null, ['class' => 'form-control']) !!}
</div>

<!-- Sit Bc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sit_bc', __('models/students.fields.sit_bc').':') !!}
    {!! Form::number('sit_bc', null, ['class' => 'form-control']) !!}
</div>

<!-- Sit Ru Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sit_ru', __('models/students.fields.sit_ru').':') !!}
    {!! Form::number('sit_ru', null, ['class' => 'form-control']) !!}
</div>

<!-- Sit Brs Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sit_brs', __('models/students.fields.sit_brs').':') !!}
    {!! Form::number('sit_brs', null, ['class' => 'form-control']) !!}
</div>