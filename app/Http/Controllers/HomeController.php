<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role->role ?? '';
       
        $roleRoutes = [
            'admin' => 'admin.utilisateurs',
            'scolarite' => 'scolarite.dashboard',
            'comptabilite' => 'billeterie.dashboard',
            's_etude' => 'etudes.index',
            'etudiant' => 'etudiant.accueil',
            'enseignant' => 'enseignant.accueil',
            'front' => 'front.admin',
            'g_info' => 'genieinfo.etudiants',
            's_energie' => 'scienceenergie.etudiants',
            'cfm' => 'cfm.etudiants',
            'imp' => 'imp.etudiants',
            'teb' => 'teb.etudiants',
            't_laboratoire' => 'tl.etudiants',
        ];

        if (array_key_exists($role, $roleRoutes)) {
            return redirect()->route($roleRoutes[$role]);
        }

        return redirect()->route('login'); // Replace 'default.route' with a route of your choice
    }

    public function deconnection()
    {
        return redirect()->route('login');
    }
}
