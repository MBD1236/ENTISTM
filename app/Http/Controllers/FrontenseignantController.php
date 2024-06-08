<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontenseignantRequest;
use App\Http\Requests\Temoignagesrequest;
use App\Models\Frontenseignant;
use App\Models\Temoignages;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class FrontenseignantController extends Controller
{
    public function index () : View
    {
        return view('front-office-back.front-enseignants.index');
    }

    public function store(FrontenseignantRequest $frontenseignantRequest): RedirectResponse
    {
        $data = $frontenseignantRequest->validated();

        // Gestion de l'upload des fichiers
        if ($frontenseignantRequest->hasFile('image')) {
            $data['image_path'] = $frontenseignantRequest->file('image')->store('enseignants/images', 'public');
        }

        $frontenseignant = Frontenseignant::create($data);

        return redirect()->route('frontenseignants.index')->with('info', 'Le profil a été ajouté avec succès !');
    }

    public function show(): View
    {
        $frontenseignants = Frontenseignant::paginate(10);
        return view('front-office-back.front-enseignants.show', compact('frontenseignants'));
    }

    public function edit (Frontenseignant $frontenseignant) : view
    {
        return view('front-office-back.front-enseignants.edit', compact('frontenseignant'));
    }

    public function update(Request $request, Frontenseignant $frontenseignant): RedirectResponse
    {
        $validated = $request->validate([
            'nom' => 'required|string','regex:[A-Z]',
            'prenom' => 'required|string','regex:[A-Z]',
            'cours' => 'required|string','regex:[A-Z]',
            'email' => 'required|email',
            'tel' => 'required|numeric',
            'link_fb' => 'nullable|string',
            'link_in' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $frontenseignant->nom = $validated['nom'];
        $frontenseignant->prenom = $validated['prenom'];
        $frontenseignant->email = $validated['email'];
        $frontenseignant->tel = $validated['tel'];
        $frontenseignant->link_fb = $validated['link_fb'];
        $frontenseignant->link_in = $validated['link_in'];

        if ($request->hasFile('image') && $frontenseignant->image_path) {
            Storage::delete($frontenseignant->image_path);
        }

        if ($request->hasFile('image')) {
            $frontenseignant->image_path = $request->file('image')->store('images');
        }

        $frontenseignant->update();

        return redirect()->route('frontenseignants.show', $frontenseignant->id)->with('info', 'Le profil a été modifié avec succès !');
    }

    public function delete (Frontenseignant $frontenseignant) : RedirectResponse
    {
        try {

            $frontenseignant->delete();

            return redirect()->route('frontenseignants.show')->with('info', 'Le profil a été supprimé avec succès !');

        } catch (Exception $e) {
            dd($e);
        }
    }
}
