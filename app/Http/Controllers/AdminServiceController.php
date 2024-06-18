<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Departement;
use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Programme;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function dashboard() {
        $etudiants = Etudiant::all()->count();
        $inscrits = Inscription::all()->count();
        $programmes = Programme::all()->count();
        $departements = Departement::all()->count();
        return view('admins.dashboard',[
            'etudiants' => $etudiants,
            'inscrits' => $inscrits,
            'progs' => $programmes,
            'deps' => $departements,
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins/parametres/service/index', [
            'services' => Service::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service = new Service();
        return view('admins/parametres/service/form', [
            'service' => $service,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        Service::create($request->validated());
        return redirect()->route('admin.service.index')->with('success', 'Ajout effectué avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admins/parametres/service/form',[
            'service' => $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $data = $request->validated();
        $service->update($data);
        return redirect()->route('admin.service.index')->with('success', 'Modification effectué avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.service.index')->with('success', 'Suppression effectué avec succès !');
    }
}

