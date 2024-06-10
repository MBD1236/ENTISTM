<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $role = Auth::user()->role->role ?? '';
        if ($role === 'g_info')
            return redirect()->route('genieinfo.etudiants');
        elseif ($role === 'scolarite')
            return redirect()->route('scolarite.dashboard');
        elseif ($role === 'comptabilite')
            return redirect()->route('dashboard');
        elseif ($role === 's_energie')
            return redirect()->route('scienceenergie.etudiants');
        elseif ($role === 'cfm')
            return redirect()->route('cfm.etudiants');
        elseif ($role === 'imp')
            return redirect()->route('imp.etudiants');
        elseif ($role === 'teb')
            return redirect()->route('teb.etudiants');
        elseif ($role === 't_laboratoire')
            return redirect()->route('tl.etudiants');
        elseif ($role === 'scolarite')
            return redirect()->route('scolarite.etudiant.index');
        elseif ($role === 'admin')
            return redirect()->route('admin.etudiant.index');
    }
    
    public function deconnection() {
        return redirect()->route('login');
    }

}
