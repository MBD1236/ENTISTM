<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgrammesetudesRequest;
use App\Models\Programme;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProgrammesetudesController extends Controller
{
    public function index (Programme $programme) : View
    {
        $programmes = Programme::paginate(10);

        return view('etudes.parametres.parametre', compact('programmes'));
    }

    public function store (ProgrammesetudesRequest $programmesetudesRequest) : RedirectResponse
    {
        $programme = Programme::create($programmesetudesRequest->all());

        return redirect()->route('etudes.parametre')->with('info', 'Le programme a été ajouté avec succès !');

    }

    public function edit (Programme $programme) : View
    {
        $programmes = Programme::paginate(10);
        return View('etudes.parametres.programmes.edit', compact('programme', 'programmes'));
    }

    public function update (ProgrammesetudesRequest $programmesetudesRequest, Programme $programme) : RedirectResponse
    {
        $programme = Programme::find($programme->id);

        $programme->programme = $programmesetudesRequest->programme;
        $programme->save();

        return redirect()->route('programme.edit', compact('programme'))->with('info', 'Modification effectuée avec succès !');
    }

    public function delete (Programme $programme) : RedirectResponse
    {
        try {

            $programme->delete();

            return redirect()->route('etudes.parametre')->with('info', 'Le programme a été supprimé avec succès !');

        } catch (Exception $e) {
            dd($e);
        }
    }
}
