<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use App\Models\Photo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index(): View
    {
        $photos = Photo::paginate(10); // Utiliser la pagination pour les photos
        return view('front-office-back.galeries.index', compact('photos')); // Passer les photos à la vue
    }

    public function store(PhotoRequest $photoRequest): RedirectResponse
    {
        if ($photoRequest->hasfile('photos')) {
            foreach ($photoRequest->file('photos') as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $name, 'public');

                Photo::create(['file_path' => '/storage/' . $filePath]); // Utiliser create pour chaque fichier
            }
        }

        return redirect()->route('photos.index')->with('info', 'Photos téléversées avec succès !');
    }

    public function show () : View
    {
        $photos = Photo::paginate(6);
        return view('front-office-back.galeries.show', compact('photos'));
    }

    public function edit($id): View
    {
        $photo = Photo::findOrFail($id);
        return view('front-office-back.galeries.edit', compact('photo'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photo = Photo::findOrFail($id);

        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $name = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $name, 'public');

            // Supprimer l'ancienne photo si elle existe
            if ($photo->file_path) {
                Storage::delete('public/' . str_replace('/storage/', '', $photo->file_path));
            }

            // Mettre à jour le chemin de la photo
            $photo->file_path = '/storage/' . $filePath;
            $photo->save();
        }

        return redirect()->route('photos.show')->with('info', 'La photo a été modifiée avec succès !');
    }

    public function delete($id): RedirectResponse
    {
        $photo = Photo::findOrFail($id);

        // Supprimer le fichier physique s'il existe
        if ($photo->file_path) {
            Storage::delete('public/' . str_replace('/storage/', '', $photo->file_path));
        }

        $photo->delete();

        return redirect()->route('photos.show')->with('info', 'La photo a été supprimée avec succès !');
    }

    public function deleteAll(): RedirectResponse
    {
        // Récupérer toutes les photos
        $photos = Photo::all();

        // Parcourir chaque photo et supprimer son fichier physique s'il existe
        foreach ($photos as $photo) {
            if ($photo->file_path) {
                Storage::delete('public/' . str_replace('/storage/', '', $photo->file_path));
            }
        }

        // Supprimer toutes les photos de la base de données
        Photo::truncate();

        return redirect()->route('photos.show')->with('info', 'Toutes les images ont été supprimées avec succès !');
    }

}
