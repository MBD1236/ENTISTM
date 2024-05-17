<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('scolarite/parametres/service/index', [
            'services' => Service::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service = new Service();
        return view('scolarite/parametres/service/form', [
            'service' => $service,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        Service::create($request->validated());
        return redirect()->route('scolarite.service.index')->with('success', 'Ajout effectué avec succès !');
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
        return view('scolarite/parametres/service/form',[
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
        return redirect()->route('scolarite.service.index')->with('success', 'Modification effectué avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('scolarite.service.index')->with('success', 'Suppression effectué avec succès !');
    }
}
