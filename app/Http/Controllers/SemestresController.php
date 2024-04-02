<?php

namespace App\Http\Controllers;

use App\Http\Requests\SemestresRequest;
use App\Models\Semestre;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SemestresController extends Controller
{
    public function index (Semestre $semestre) : View
    {
        $semestres = Semestre::paginate(5);

        return view('scolarite.parametres.parametre', compact('semestres'));
    }

    public function store (SemestresRequest $semestresRequest) : RedirectResponse
    {
        $semestre = Semestre::create($semestresRequest->all());

        return redirect()->route('scolarite.parametre')->with('info', 'Le semestre a été ajouté avec succès !');

    }

    public function edit (Semestre $semestre) : View
    {
        $semestres = Semestre::paginate(10);
        return View('scolarite.parametres.semestres.edit', compact('semestre', 'semestres'));
    }

    public function update (SemestresRequest $semestresRequest, Semestre $semestre) : RedirectResponse
    {
        $semestre = Semestre::find($semestre->id);

        $semestre->semestre = $semestresRequest->semestre;
        $semestre->save();

        return redirect()->route('semestre.edit', compact('semestre'))->with('info', 'Modification effectuée avec succès !');
    }

    public function delete (Semestre $semestre) : RedirectResponse
    {
        try {

            $semestre->delete();

            return redirect()->route('scolarite.parametre')->with('info', 'Le semestre a été supprimé avec succès !');

        } catch (Exception $e) {
            dd($e);
        }
    }
}
