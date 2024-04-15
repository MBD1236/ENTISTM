<?php

use App\Http\Controllers\AnneeUnivController;
use App\Http\Controllers\DepartementsetudesController;
use App\Http\Controllers\EmploisController;
use App\Http\Controllers\EnseignantsController;
use App\Http\Controllers\EtudesController;
use App\Http\Controllers\NiveauxetudesController;
use App\Http\Controllers\ProgrammesetudesController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ScolariteController;
use App\Http\Controllers\SemestresController;
use App\Livewire\Scolarite\EditEtudiant;
use App\Livewire\Scolarite\EditInscription;
use App\Livewire\Scolarite\EtudiantTables;
use App\Livewire\Scolarite\InscriptionEtudiant;

use App\Livewire\Scolarite\InscriptionTables;
use App\Livewire\Scolarite\ReinscriptionEtudiant;
use App\Livewire\Scolarite\ViewDocuments;

use function Livewire\store;
use Illuminate\Support\Facades\Route;


/* Routes de l'interface de la scolarité */
Route::prefix('scolarite')->group(function () {
    Route::get('/', [ScolariteController::class, 'index'])->name('scolarite.dashboard');
    Route::get('/inscription', InscriptionEtudiant::class)->name('scolarite.inscription');
    Route::get('/listeinscritsetreinscrits', InscriptionTables::class)->name('inscriptionetreinscription.index');
    Route::get('/reinscription', ReinscriptionEtudiant::class)->name('scolarite.reinscription');
    Route::get('/inscritption/edit/{inscription}', EditInscription::class)->name('scolarite.inscription.edit');
    Route::get('/etudiants', EtudiantTables::class)->name('scolarite.orientation');
    Route::get('/etudiant/edit/{etudiant}', EditEtudiant::class)->name('scolarite.etudiant.edit');
    Route::get('/etudiant/documents/{etudiant}', ViewDocuments::class)->name('scolarite.etudiant.documents');


    // Route::get('/inscription', [ScolariteController::class, 'inscription'])->name('scolarite.inscription');
    // Route::get('/reinscription', [ScolariteController::class, 'reinscription'])->name('scolarite.reinscription');
    Route::get('/parametre', [ScolariteController::class, 'afficherParametre'])->name('scolarite.parametre');
    // Route::get('/orientation', [ScolariteController::class, 'orientation'])->name('scolarite.orientation');
    

    Route::get('/inscrits', [ScolariteController::class, 'inscrits'])->name('scolarite.inscrits');

    Route::prefix('parametres')->group(function () {
        Route::prefix('session')->group(function () {
            Route::get('/', [AnneeUnivController::class, 'index'])->name('session.index');
            Route::post('/', [AnneeUnivController::class, 'store'])->name('session.store');
            Route::get('/edit/{anneeUniv}', [AnneeUnivController::class, 'edit'])->name('session.edit');
            Route::put('/update/{anneeUniv}', [AnneeUnivController::class, 'update'])->name('session.update');
            Route::get('/delete/{anneeUniv}', [AnneeUnivController::class, 'delete'])->name('session.delete');
        });
        Route::prefix('promotion')->group(function () {
            Route::get('/', [PromotionController::class, 'index'])->name('promotion.index');
            Route::post('/', [PromotionController::class, 'store'])->name('promotion.store');
            Route::get('/edit/{promotion}', [PromotionController::class, 'edit'])->name('promotion.edit');
            Route::put('/update/{promotion}', [PromotionController::class, 'update'])->name('promotion.update');
            Route::get('/delete/{promotion}', [PromotionController::class, 'delete'])->name('promotion.delete');
        });
        Route::prefix('semestre')->group(function () {
            Route::get('/', [SemestresController::class, 'index'])->name('semestre.index');
            Route::post('/', [SemestresController::class, 'store'])->name('semestre.store');
            Route::get('/edit/{semestre}', [SemestresController::class, 'edit'])->name('semestre.edit');
            Route::put('/update/{semestre}', [SemestresController::class, 'update'])->name('semestre.update');
            Route::get('/delete/{semestre}', [SemestresController::class, 'delete'])->name('semestre.delete');
        });
    });
});

Route::prefix('etudes')->group(function () {
    Route::get('/', [EtudesController::class, 'index'])->name('etudes.index');
    Route::get('/parametre', [EtudesController::class, 'afficherParametre'])->name('etudes.parametre');

    Route::prefix('emplois')->group(function () {
        Route::prefix('cours')->group(function () {
            Route::get('/', [EmploisController::class, 'indexCours'])->name('cours.index');
        });
        Route::prefix('composition')->group(function () {
            Route::get('/', [EmploisController::class, 'indexComposition'])->name('composition.index');
        });
    });

    Route::prefix('parametres')->group(function () {
        Route::prefix('departement')->group(function () {
            Route::get('/', [DepartementsetudesController::class, 'index'])->name('departement.index');
            Route::post('/', [DepartementsetudesController::class, 'store'])->name('departement.store');
            Route::get('/edit/{departement}', [DepartementsetudesController::class, 'edit'])->name('departement.edit');
            Route::put('/update/{departement}', [DepartementsetudesController::class, 'update'])->name('departement.update');
            Route::get('/delete/{departement}', [DepartementsetudesController::class, 'delete'])->name('departement.delete');
        });
        Route::prefix('programme')->group(function () {
            Route::get('/', [ProgrammesetudesController::class, 'index'])->name('programme.index');
            Route::post('/', [ProgrammesetudesController::class, 'store'])->name('programme.store');
            Route::get('/edit/{programme}', [ProgrammesetudesController::class, 'edit'])->name('programme.edit');
            Route::put('/update/{programme}', [ProgrammesetudesController::class, 'update'])->name('programme.update');
            Route::get('/delete/{programme}', [ProgrammesetudesController::class, 'delete'])->name('programme.delete');
        });
        Route::prefix('niveau')->group(function () {
            Route::get('/', [NiveauxetudesController::class, 'index'])->name('niveau.index');
            Route::post('/', [NiveauxetudesController::class, 'store'])->name('niveau.store');
            Route::get('/edit/{niveau}', [NiveauxetudesController::class, 'edit'])->name('niveau.edit');
            Route::put('/update/{niveau}', [NiveauxetudesController::class, 'update'])->name('niveau.update');
            Route::get('/delete/{niveau}', [NiveauxetudesController::class, 'delete'])->name('niveau.delete');
        });
    });
});


Route::get('/enseignants', [EnseignantsController::class, 'index'])->name('enseignant.dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



