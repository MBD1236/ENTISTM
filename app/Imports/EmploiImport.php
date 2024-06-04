<?php

namespace App\Imports;

use App\Models\EmploiTemps;
use App\Models\Enseignant;
use App\Models\Matiere;


class EmploiImport implements ToModo, WithHeadingRow
{
    /**
     * @var int
    */
    private $programme_id;
    private $annee_universitaire_id;
    private $promotion_id;
    private $semestre_id;
    
    /**
     * NoteImport constructor.
     *
     * @param int $matiereId
    */
    public function __construct(int $programme_id, int $annee_universitaire_id, int $promotion_id, int $semestre_id) {
        $this->programme_id = $programme_id;
        $this->annee_universitaire_id = $annee_universitaire_id;
        $this->promotion_id = $promotion_id;
        $this->semestre_id = $semestre_id;
     }
     

    /**
    * @param array $row
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $enseignant = Enseignant::where('matricule', $row['matricule'])->first();
        if (!$enseignant) {
            return null;
        }

        $matiere = Matiere::where('matiere', $row['matiere'])->first();
        if (!$matiere) {
            return null;
        }

        return new EmploiTemps([
            'jour' => $row['jour'],
            'horaire' => $row['horaire'],
            'salle' => $row['salle'],
            'programme_id' => $this->programme_id,
            'annee_universitaire_id' => $this->annee_universitaire_id,
            'promotion_id' => $this->promotion_id,
            'enseignant_id' => $enseignant->id,
            'matiere_id' => $matiere->id,
            'semestre_id' => $this->semestre_id,
        ]);
    }
}
