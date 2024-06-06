<?php

namespace App\Exports;

use App\Models\Inscription;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EnseignantExportEtudiant implements FromCollection, WithHeadings
{
    protected $programme_id;
    protected $niveau_id;
    protected $promotion_id;

    public function __construct($programme_id, $niveau_id, $promotion_id)
    {
        $this->programme_id = $programme_id;
        $this->niveau_id = $niveau_id;
        $this->promotion_id = $promotion_id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inscription::whereHas('programme', function($i){
            $i->where('id', $this->programme_id);
        })->whereHas('niveau', function($i) {
            $i->where('id', $this->niveau_id);
        })->whereHas('promotion', function($i){
            $i->where('promotion_id', $this->promotion_id);
        })->get()
        ->map(function($inscription) {
            return [
                'ine' => $inscription->etudiant->ine,
                'nom' => $inscription->etudiant->nom,
                'prenom' => $inscription->etudiant->prenom,
                'programme' => $inscription->programme->programme,
                'niveau' => $inscription->niveau->niveau,
                'promotion' => $inscription->promotion->promotion, // assuming `nom` is a column in the `promotion` table
                // Ajoutez d'autres champs liés si nécessaire
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Ine',
            'Nom',
            'Prenom',
            'Programme',
            'Niveau',
            'Promotion',
            // Ajoutez d'autres en-têtes si nécessaire
        ];
    }
}
