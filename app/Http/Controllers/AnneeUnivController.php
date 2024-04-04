<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnneeUnivRequest;
use App\Models\AnneeUniversitaire;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AnneeUnivController extends Controller
{
    public function index (AnneeUniversitaire $anneeUniv) : View
    {
        $anneeUnivs = AnneeUniversitaire::paginate(5);

        return view('scolarite.parametres.parametre', compact('anneeUnivs'));
    }

    public function store (AnneeUnivRequest $anneeUnivRequest) : RedirectResponse
    {
        $anneeUniv = AnneeUniversitaire::create($anneeUnivRequest->all());

        return redirect()->route('scolarite.parametre')->with('info', 'La session a été ajoutée avec succès !');

    }

    public function edit (AnneeUniversitaire $anneeUniv) : view
    {
        $anneeUnivs = AnneeUniversitaire::paginate(10);
        return View('scolarite.parametres.sessions.edit', compact('anneeUniv', 'anneeUnivs'));
    }

    public function update (AnneeUnivRequest $anneeUnivRequest, AnneeUniversitaire $anneeUniv) : RedirectResponse
    {
        $anneeUniv = AnneeUniversitaire::find($anneeUniv->id);

        $anneeUniv->session = $anneeUnivRequest->session;
        $anneeUniv->save();

        return redirect()->route('session.edit', compact('anneeUniv'))->with('info', 'Modification effectuée avec succès !');
    }

    public function delete (AnneeUniversitaire $anneeUniv) : RedirectResponse
    {
        try {

            $anneeUniv->delete();

            return redirect()->route('scolarite.parametre')->with('info', 'La session a été supprimée avec succès !');

        } catch (Exception $e) {
            dd($e);
        }
    }
}
