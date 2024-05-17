<?php

namespace App\Http\Controllers;

use App\Http\Requests\NiveauxetudesRequest;
use App\Models\Niveau;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NiveauxetudesController extends Controller
{
    public function index (Niveau $niveau) : View
    {
        $Niveaux = Niveau::orderBy('created_at', 'desc')->paginate(10);

        return view('etudes.parametres.parametre', compact('niveaux'));
    }

    public function store (NiveauxetudesRequest $niveauxetudesRequest) : RedirectResponse
    {
        $niveau = Niveau::create($niveauxetudesRequest->all());

        return redirect()->route('etudes.parametre')->with('info', 'Le niveau a été ajouté avec succès !');

    }

    public function edit (Niveau $niveau) : View
    {
        $niveaux = Niveau::paginate(10);
        return View('etudes.parametres.niveaux.edit', compact('niveau', 'niveaux'));
    }

    public function update (NiveauxetudesRequest $niveauxetudesRequest, Niveau $niveau) : RedirectResponse
    {
        $niveau = Niveau::find($niveau->id);

        $niveau->niveau = $niveauxetudesRequest->niveau;
        $niveau->save();

        return redirect()->route('niveau.edit', compact('niveau'))->with('info', 'Modification effectuée avec succès !');
    }

    public function delete (Niveau $niveau) : RedirectResponse
    {
        try {

            $niveau->delete();

            return redirect()->route('etudes.parametre')->with('info', 'Le niveau a été supprimé avec succès !');

        } catch (Exception $e) {
            dd($e);
        }
    }
}
