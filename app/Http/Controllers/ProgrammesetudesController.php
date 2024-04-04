<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgrammesetudesRequest;
use App\Models\Departement;
use App\Models\Programme;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProgrammesetudesController extends Controller
{
    public function index (Programme $programme) : View
    {
        $programmes = Programme::paginate(10);
        $departements = Departement::all();

        return view('etudes.parametres.parametre', compact('programmes', 'departements'));
    }

    public function store (ProgrammesetudesRequest $programmesetudesRequest) : RedirectResponse
    {
        $programme = Programme::create($programmesetudesRequest->validated());

        return redirect()->route('etudes.parametre')->with('info', 'Le programme a été ajouté avec succès !');

    }

    public function edit (Programme $programme) : View
    {
        return view('etudes.parametres.programmes.edit',[
            'programme' => $programme,
            'programmes' => Programme::paginate(10),
            'departements' => Departement::all()
        ]);
    }

    public function update (Request $request, Programme $programme) : RedirectResponse
    {
        $data = $request->validate([
            'programme' => [
                'required',
                Rule::unique('programmes')->ignore($programme->id)
            ],
            'departement_id' => [
                'required'
            ]
        ]);
        $programme->update($data);

        return redirect()->route('programme.edit', compact('programme'))->with('info', 'Modification effectuée avec succès !');
    }

    public function delete (Programme $programme) : RedirectResponse
    {
        try {

            $programme->delete();

            return redirect()->route('etudes.parametre')->with('info', 'Le programme a été supprimé avec succès !');

        } catch (Exception $e) {
            return redirect()->route('etudes.parametre')->with('info', 'erreur de suppression : ' .$e->getMessage());
        }
    }
}
