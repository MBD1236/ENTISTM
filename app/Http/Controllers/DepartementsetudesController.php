<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartementsetudesRequest;
use App\Models\Departement;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DepartementsetudesController extends Controller
{
    public function index (Departement $departement) : View
    {
        $departements = Departement::paginate(10);

        return view('etudes.parametres.parametre', compact('departements'));
    }

    public function store (DepartementsetudesRequest $departementsetudesRequest) : RedirectResponse
    {
        $departement = Departement::create($departementsetudesRequest->all());

        return redirect()->route('etudes.parametre')->with('info', 'Le département a été ajouté avec succès !');

    }

    public function edit (Departement $departement) : View
    {
        $departements = Departement::paginate(10);
        return View('etudes.parametres.departements.edit', compact('departement', 'departements'));
    }

    public function update (DepartementsetudesRequest $departementsetudesRequest, Departement $departement) : RedirectResponse
    {
        $departement = Departement::find($departement->id);

        $departement->departement = $departementsetudesRequest->departement;
        $departement->save();

        return redirect()->route('departement.edit', compact('departement'))->with('info', 'Modification effectuée avec succès !');
    }

    public function delete (Departement $departement) : RedirectResponse
    {
        try {

            $departement->delete();

            return redirect()->route('etudes.parametre')->with('info', 'Le département a été supprimé avec succès !');

        } catch (Exception $e) {
            dd($e);
        }
    }
}
