<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;


class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'id_bac' => $this->faker->word,
            'annee_bac' => $this->faker->text($this->faker->numberBetween(5, 10)),
            'matricule' => $this->faker->text($this->faker->numberBetween(5, 15)),
            'id_etudiant' => $this->faker->word,
            'numero_matricule_etudiant' => $this->faker->text($this->faker->numberBetween(5, 25)),
            'id_dia' => $this->faker->word,
            'numero_inscription' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'id_annee_academique' => $this->faker->word,
            'id_etablissement' => $this->faker->word,
            'll_etablissement_arabe' => $this->faker->text($this->faker->numberBetween(5, 250)),
            'id_departement' => $this->faker->word,
            'll_departement' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'id_faculte' => $this->faker->word,
            'll_faculte' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'lc_domaine' => $this->faker->text($this->faker->numberBetween(5, 100)),
            'll_filiere' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'll_filiere_arabe' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'll_specialite' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'll_specialite_arabe' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'cycle' => $this->faker->text($this->faker->numberBetween(5, 150)),
            'niveau' => $this->faker->text($this->faker->numberBetween(5, 5)),
            'id_residence' => $this->faker->word,
            'll_residence' => $this->faker->text($this->faker->numberBetween(5, 250)),
            'dou' => $this->faker->word,
            'll_dou' => $this->faker->text($this->faker->numberBetween(5, 250)),
            'id_individu' => $this->faker->word,
            'nom_latin' => $this->faker->text($this->faker->numberBetween(5, 50)),
            'nom_arabe' => $this->faker->text($this->faker->numberBetween(5, 50)),
            'prenom_latin' => $this->faker->text($this->faker->numberBetween(5, 50)),
            'prenom_arabe' => $this->faker->text($this->faker->numberBetween(5, 50)),
            'date_naissance' => $this->faker->date('Y-m-d'),
            'prenom_mere_latin' => $this->faker->text($this->faker->numberBetween(5, 50)),
            'prenom_mere_arabe' => $this->faker->text($this->faker->numberBetween(5, 50)),
            'nom_mere_latin' => $this->faker->text($this->faker->numberBetween(5, 50)),
            'nom_mere_arabe' => $this->faker->text($this->faker->numberBetween(5, 50)),
            'lieu_naissance' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'sit_dep' => $this->faker->word,
            'sit_bf' => $this->faker->word,
            'sit_bc' => $this->faker->word,
            'sit_ru' => $this->faker->word,
            'sit_brs' => $this->faker->word
        ];
    }
}
