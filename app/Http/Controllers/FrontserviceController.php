<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontserviceRequest;
use App\Models\Frontservice;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class FrontserviceController extends Controller
{
    public function index () : View
    {
        return view('front-office-back.front-services.index');
    }
    public function store(FrontserviceRequest $frontserviceRequest): RedirectResponse
    {
        $data = $frontserviceRequest->validated();

        // Gestion de l'upload des fichiers
        if ($frontserviceRequest->hasFile('image')) {
            $data['image_path'] = $frontserviceRequest->file('image')->store('services/images', 'public');
        }

        $frontservice = Frontservice::create($data);

        return redirect()->route('frontservice.index')->with('info', 'Le service a été ajouté avec succès !');
    }

    public function show(): View
    {
        $frontservices = Frontservice::paginate(6);
        return view('front-office-back.front-services.show', compact('frontservices'));
    }

    public function edit (Frontservice $frontservice) : view
    {
        return view('front-office-back.front-services.edit', compact('frontservice'));
    }

    public function update(Request $request, Frontservice $frontservice): RedirectResponse
    {
        $validated = $request->validate([
            'nomservice' => 'required|string','regex:[A-Z]',
            'email' => 'required|email',
            'tel' => 'required|numeric',
            'texte' => 'required',
            'image_paht' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $frontservice->nomservice = $validated['nomservice'];
        $frontservice->email = $validated['email'];
        $frontservice->tel = $validated['tel'];
        $frontservice->texte = $validated['texte'];

        if ($request->hasFile('image') && $frontservice->image_path) {
            Storage::delete($frontservice->image_path);
        }

        if ($request->hasFile('image')) {
            $frontservice->image_path = $request->file('image')->store('images');
        }

        $frontservice->save();

        return redirect()->route('frontservice.show', $frontservice->id)->with('info', 'Le service a été modifié avec succès !');
    }

    public function delete (Frontservice $frontservice) : RedirectResponse
    {
        try {

            $frontservice->delete();

            return redirect()->route('frontservice.show')->with('info', 'Le service a été supprimé avec succès !');

        } catch (Exception $e) {
            dd($e);
        }
    }
}
