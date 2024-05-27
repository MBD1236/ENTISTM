<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesRequest;
use App\Models\Articles;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function index(): View
    {
        return view('front-office-back.articles.index');
    }

    public function store(ArticlesRequest $articlesRequest): RedirectResponse
    {
        $data = $articlesRequest->validated();

        // Gestion de l'upload des fichiers
        if ($articlesRequest->hasFile('image')) {
            $data['media_path'] = $articlesRequest->file('image')->store('articles/images', 'public');
            $data['media_type'] = 'image';
        }
        if ($articlesRequest->hasFile('video')) {
            $data['media_path'] = $articlesRequest->file('video')->store('articles/videos', 'public');
            $data['media_type'] = 'video';
        }

        // Créer l'article avec les données y compris les chemins des fichiers
        $article = Articles::create($data);

        return redirect()->route('articles.index')->with('info', 'L\'article a été publié avec succès !');
    }

    public function show(): View
    {
        $articles = Articles::paginate(10);
        return view('front-office-back.articles.show', compact('articles'));
    }

    public function edit (Articles $article) : view
    {
        return view('front-office-back.articles.edit', compact('article'));
    }

    public function update(Request $request, Articles $article): RedirectResponse
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'texte' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:10000',
        ]);

        $article->titre = $validated['titre'];
        $article->description = $validated['description'];
        $article->texte = $validated['texte'];

        if ($request->hasFile('image')) {
            // Supprimer l'ancien fichier s'il existe
            if ($article->media && Storage::exists($article->media)) {
                Storage::delete($article->media);
            }
            // Stocker le nouveau fichier
            $path = $request->file('image')->store('media');
            $article->media = $path;
        }

        if ($request->hasFile('video')) {
            // Supprimer l'ancien fichier s'il existe
            if ($article->media && Storage::exists($article->media)) {
                Storage::delete($article->media);
            }
            // Stocker le nouveau fichier
            $path = $request->file('video')->store('media');
            $article->media = $path;
        }

        $article->save();

        return redirect()->route('articles.show')->with('info', 'L\'article a été mis à jour avec succès !');
    }

    public function delete (Articles $article) : RedirectResponse
    {
        try {

            $article->delete();

            return redirect()->route('articles.show')->with('info', 'L\'article a été supprimée avec succès !');

        } catch (Exception $e) {
            dd($e);
        }
    }
}
