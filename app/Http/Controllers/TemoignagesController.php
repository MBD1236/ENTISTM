<?php

namespace App\Http\Controllers;

use App\Http\Requests\Temoignagesrequest;
use App\Models\Temoignages;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class TemoignagesController extends Controller
{
    public function index () : View
    {
        return view('front-office-back.temoignages.index');
    }
    public function store(Temoignagesrequest $temoignagesrequest): RedirectResponse
    {
        $data = $temoignagesrequest->validated();

        // Gestion de l'upload des fichiers
        if ($temoignagesrequest->hasFile('image')) {
            $data['image_path'] = $temoignagesrequest->file('image')->store('temoignages/images', 'public');
        }

        $temoignage = Temoignages::create($data);

        return redirect()->route('temoignages.index')->with('info', 'Le témoignage a été ajouté avec succès !');
    }

    public function show(): View
    {
        $temoignages = Temoignages::paginate(10);
        return view('front-office-back.temoignages.show', compact('temoignages'));
    }

    public function edit (Temoignages $temoignage) : view
    {
        return view('front-office-back.temoignages.edit', compact('temoignage'));
    }

    public function update(Request $request, Temoignages $temoignage): RedirectResponse
    {
        $validated = $request->validate([
            'nom' => 'required|string','regex:[A-Z]',
            'prenom' => 'required|string','regex:[A-Z]',
            'fonction' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'texte' => 'required|string',
        ]);

        $temoignage->nom = $validated['nom'];
        $temoignage->prenom = $validated['prenom'];
        $temoignage->fonction = $validated['fonction'];
        $temoignage->texte = $validated['texte'];

        if ($request->hasFile('image') && $temoignage->image_path) {
            Storage::delete($temoignage->image_path);
        }

        if ($request->hasFile('image')) {
            $temoignage->image_path = $request->file('image')->store('images');
        }

        $temoignage->save();

        return redirect()->route('temoignages.show', $temoignage->id)->with('info', 'Le témoignage a été modifié avec succès !');
    }

    public function delete (Temoignages $temoignage) : RedirectResponse
    {
        try {

            $temoignage->delete();

            return redirect()->route('temoignages.show')->with('info', 'Le Témoignage a été supprimée avec succès !');

        } catch (Exception $e) {
            dd($e);
        }
    }
}
