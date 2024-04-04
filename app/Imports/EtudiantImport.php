<?php

namespace App\Imports;

use App\Models\Etudiant;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class EtudiantImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row['ine']) {
            $dateNaissance = Carbon::instance(Date::excelToDateTimeObject($row['date_naissance']));
            return new Etudiant([
                "ine" => $row['ine'],
                "pv" => $row['pv'],
                "nom" => $row['nom'],
                "prenom" => $row['prenom'],
                "telephone" => $row['telephone'],
                "email" => $row['email'],
                "adresse" => $row['adresse'],
                "session" => $row['session'],
                "profil" => $row['profil'],
                "centre" => $row['centre'],
                "ecole_origine" => $row['ecole_origine'],
                "date_naissance" => $dateNaissance->toDateString(),
                "lieu_naissance" => $row['lieu_naissance'],
                "pere" => $row['pere'],
                "mere" => $row['mere'],
                "programme" => $row['programme']
            ]);
        }
        return null; 
    }
}

