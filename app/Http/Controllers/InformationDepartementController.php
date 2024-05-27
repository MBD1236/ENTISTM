<?php

namespace App\Http\Controllers;

use App\Models\InformationDepartement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class InformationDepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("departements.informationDepartement.index" , [
            "informations"=> InformationDepartement::orderBy("created_at","desc")->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $information = new InformationDepartement();
        return view("departements.informationDepartement.form" , [
           'information' => $information,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->route('information');
        $data = $request->validate([
            "departement" => ["required",  Rule::unique('information_departements')->ignore($id, 'id')],
            "code" => ["required",  Rule::unique('information_departements')->ignore($id, 'id')],
            "telephone" => ['required','regex:/^([0-9\s\-\+\(\)]*)$/', 'between:9,18', Rule::unique('information_departements')->ignore($id, 'id')],
            "email" => ["required" ,  Rule::unique('information_departements')->ignore($id, 'id')],
            "adresse" => ["required"],
            "description" => ['required', 'min:8'],
            "photo" => ["required", 'mimes:jpeg,png,jpg,gif,svg,icon'],
        ]);

        $photo = $data['photo'];
        
        /** @var UploadedFile|null $photo */
        if ($photo !== null && !$photo->getError()) {
            $photoSansExt = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $nouveauNom = $photoSansExt . '_' . now()->format('YmdHis') . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/informations', $nouveauNom);
            $data['photo'] = $nouveauNom;
        }

        InformationDepartement::create($data);
        return redirect()->route('genieinfo.departement.infomation.index')->with('success','Ajout éffectué avec succès');
    }


    /**
     * Display the specified resource.
     */
    public function show(InformationDepartement $information)
    {
        return view('departements.informationDepartement.show' , [
            'information' => $information,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InformationDepartement $information)
    {
        return view('departements.informationDepartement.form' , [
            'information' => $information,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InformationDepartement $information)
    {
        $id = $information->id;
        $data = $request->validate([
            "departement" => ["required",  Rule::unique('information_departements')->ignore($id, 'id')],
            "code" => ["required",  Rule::unique('information_departements')->ignore($id, 'id')],
            "telephone" => ['required','regex:/^([0-9\s\-\+\(\)]*)$/', 'between:9,18', Rule::unique('information_departements')->ignore($id, 'id')],
            "email" => ["required" ,  Rule::unique('information_departements')->ignore($id, 'id')],
            "adresse" => ["required"],
            "description" => ['required', 'min:8'],
            "photo" => ['mimes:jpeg,png,jpg,gif,svg,icon'],
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            if ($information->photo) {
                Storage::disk('public')->delete('informations/'.$information->photo);
            }
            
            // Générer un nouveau nom de fichier avec la date actuelle
            $photoSansExt = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $nouveauNom = $photoSansExt . '_' . now()->format('YmdHis') . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/informations', $nouveauNom);
            $data['photo'] = $nouveauNom;
        }

        $information->update($data);
        return redirect()->route('genieinfo.departement.infomation.index')->with('success', 'Modification effectuée avec succès');
    }


}
