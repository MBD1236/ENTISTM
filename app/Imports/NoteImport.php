<?php

namespace App\Imports;

use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Note;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NoteImport implements ToModel, WithHeadingRow
{
        /**
     * @var int
     */
    private $matiere_id;

    /**
     * NoteImport constructor.
     *
     * @param int $matiereId
     */
    public function __construct(int $matiereId)
    {
        $this->matiere_id = $matiereId;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $notes = [];
        // Trouver les etudiants en fonction du matricule
        $etudiants = Etudiant::where('ine', $row['matricule'])->get();

        //parcourir ces etudiants pour trouver les id
        foreach ($etudiants as $etudiant) {

            // Trouver l'inscription de l'étudiant pour la matière donnée
            $inscription = Inscription::where('etudiant_id', $etudiant->id)->first();

            if (!$inscription) {
                // Si l'inscription n'est pas trouvée, ne rien faire ou gérer l'erreur selon vos besoins
                return null;
            }

            // Créer une nouvelle note en utilisant les données de la ligne du fichier Excel
            $notes[] = new Note([
                'inscription_id' => $inscription->id,
                'matiere_id' => $this->matiere_id,
                'note1' => $row['note1'],
                'note2' => $row['note2'],
                'note3' => $row['note3'],
                'moyenne_generale' => $row['moyenne_gle'],
            ]);
        }
        return $notes;
    }

}
