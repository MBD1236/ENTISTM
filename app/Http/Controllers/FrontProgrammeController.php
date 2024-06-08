<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontProgrammeRequest;
use App\Models\FrontProgramme;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontProgrammeController extends Controller
{
    public function index(): View
    {
        return view('front-office-back.front-programmes.index');
    }

    public function store(FrontProgrammeRequest $frontProgrammeRequest): RedirectResponse
    {
        $data = $frontProgrammeRequest->validated();

        if ($frontProgrammeRequest->hasFile('image')) {
            $data['image_path'] = $frontProgrammeRequest->file('image')->store('programmes/images', 'public');
        }

        FrontProgramme::create($data);

        return redirect()->route('frontprogramme.index')->with('info', 'Le programme a été publié avec succès !');
    }

    public function show(): View
    {
        $frontprogrammes = FrontProgramme::paginate(10);
        return view('front-office-back.front-programmes.show', compact('frontprogrammes'));
    }

    public function edit(FrontProgramme $frontProgramme): View
    {
        return view('front-office-back.front-programmes.edit', compact('frontProgramme'));
    }

    public function update(Request $request, $id)
{
    $frontProgramme = FrontProgramme::findOrFail($id);

    // Valider les données du formulaire
    $request->validate([
        'intitule_programme' => 'required|string|max:255',
        'duree' => 'required|string|max:255',
        'type_programme' => 'required|string',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Récupérer les données actuelles
    $currentData = [
        'intitule_programme' => $frontProgramme->intitule_programme,
        'duree' => $frontProgramme->duree,
        'type_programme' => $frontProgramme->type_programme,
        'description' => $frontProgramme->description,
    ];

    // Récupérer les nouvelles données
    $newData = $request->only(['intitule_programme', 'duree', 'type_programme', 'description']);

    // Vérifier si les données ont changé
    $dataChanged = array_diff_assoc($newData, $currentData);

    if (!empty($dataChanged) || $request->hasFile('image')) {
        // Mettre à jour les données du programme
        $frontProgramme->update($newData);

        if ($request->hasFile('image')) {
            // Gérer le téléchargement de l'image
            $imagePath = $request->file('image')->store('images', 'public');
            $frontProgramme->image_path = $imagePath;
            $frontProgramme->save();
        }

        // Définir le message de succès si les données ont été modifiées
        return redirect()->route('frontprogramme.show')->with('info', 'Programme modifié avec succès.');
    }

    // Définir le message de mise en garde si aucune modification n'a été effectuée
    return redirect()->route('frontprogramme.show')->with('warning', 'Aucune modification effectuée.');
}

    public function delete(FrontProgramme $frontProgramme): RedirectResponse
    {
        try {
            if ($frontProgramme->image_path) {
                Storage::disk('public')->delete($frontProgramme->image_path);
            }
            
            $frontProgramme->delete();

            return redirect()->route('frontprogramme.show')->with('info', 'Le programme a été supprimé avec succès !');
        } catch (Exception $e) {
            return redirect()->route('frontprogramme.show')->with('error', 'Une erreur s\'est produite lors de la suppression du programme.');
        }
    }
}