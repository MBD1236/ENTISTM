<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AnneeUnivController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AttestationController;
use App\Http\Controllers\AttestationTypeController;
use App\Http\Controllers\DepartementsetudesController;
use App\Http\Controllers\EmploisController;
use App\Http\Controllers\EnseignantsController;
use App\Http\Controllers\EtudesController;
use App\Http\Controllers\FrontAdminController;
use App\Http\Controllers\NiveauxetudesController;
use App\Http\Controllers\PrintAttestationController;
use App\Http\Controllers\PrintBadgeController;
use App\Http\Controllers\ProgrammesetudesController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ScolariteController;
use App\Http\Controllers\SemestresController;
use App\Http\Controllers\ServiceController;
use App\Livewire\Departements\GenieInformatique\EditNotes;
use App\Livewire\Departements\GenieInformatique\EnregistrementNote;
use App\Livewire\Departements\GenieInformatique\GiEnseignantsTables;
use App\Livewire\Departements\GenieInformatique\GiEtudiantsTables;
use App\Livewire\Departements\GenieInformatique\GiInscriptionsTables;
use App\Livewire\Departements\GenieInformatique\GiMatieresTables;
use App\Livewire\Departements\GenieInformatique\GiProgrammeCoursTables;
use App\Livewire\Departements\GenieInformatique\NoteEtudiantsMatieres;
use App\Livewire\Departements\GenieInformatique\NotesEtudiantsSemestre;
use App\Livewire\Scolarite\EditEtudiant;
use App\Livewire\Scolarite\EditInscription;
use App\Livewire\Scolarite\EtudiantTables;
use App\Livewire\Scolarite\InscriptionEtudiant;
use App\Livewire\Scolarite\InscriptionTables;
use App\Livewire\Scolarite\ReinscriptionEtudiant;
use App\Livewire\Scolarite\ViewDocuments;
use function Livewire\store;
use Illuminate\Support\Facades\Route;

/* Routes added by thd */
// scolarite

Route::prefix('front')->group(function () {
    Route::get('/accueil', [AccueilController::class, 'accueil'])->name('front.accueil');
    Route::get('/admin', [FrontAdminController::class, 'index'])->name('front.admin');

    Route::prefix('articles')->group(function () {
        Route::get('/', [ArticlesController::class, 'index'])->name('articles.index');
        Route::post('/', [ArticlesController::class, 'store'])->name('articles.store');
        Route::get('/show', [ArticlesController::class, 'show'])->name('articles.show');
        Route::get('/edit/{article}', [ArticlesController::class, 'edit'])->name('articles.edit');
        Route::put('/update/{article}', [ArticlesController::class, 'update'])->name('articles.update');
        Route::get('/delete/{article}', [ArticlesController::class, 'delete'])->name('articles.delete');
    });
});


Route::name("scolarite.")->group(function () {
    Route::resource("attestation", AttestationController::class)->except(["show"]);
    Route::resource("attestationType", AttestationTypeController::class)->except(["show"]);
    Route::resource("service", ServiceController::class)->except(["show"]);
    Route::get("attestation/inscription", [PrintAttestationController::class, 'attestationInscription' ])->name("attestation.inscription");
    Route::post('/fetch-students', [PrintAttestationController::class,'fetchStudents' ])->name('fetchStudents');
    Route::post('/print-attestation', [PrintAttestationController::class, 'printAttestation'])->name('printAttestation');
    // badge
    Route::get('/indexBadge', [PrintBadgeController::class, 'index'])->name('print');
    Route::post('/printBadge', [PrintBadgeController::class, 'printBadge'])->name('printBadge');
});



/* fin */

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

        // thd
        Route::resource("attestationType", AttestationTypeController::class)->except(["show"]);
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

/* Routes des interfaces des departements */
Route::prefix('genieinfo')->name("genieinfo.")->group(function(){
    Route::get("/etudiants", GiEtudiantsTables::class)->name('etudiants');
    Route::get("/matieres", GiMatieresTables::class)->name('matieres');
    // Route::get('/pdf', [DepartementController::class, 'pdf'])->name('pdf');
    Route::get("/enseignants", GiEnseignantsTables::class)->name('enseignants');
    Route::get("/enseigners", GiProgrammeCoursTables::class)->name('enseigners');
    Route::get("/inscriptions", GiInscriptionsTables::class)->name('inscriptions');
    Route::get('/notes', EnregistrementNote::class)->name('notes');
    Route::get('/notes/matiere', NoteEtudiantsMatieres::class)->name('notes.matiere');
    Route::get('/notes/matiere/{note}', EditNotes::class)->name('notes.edit');
    Route::get('/notes/semestre', NotesEtudiantsSemestre::class)->name('notes.semestre');


    // route pour emploi
    // Route::get('/emploi-temps', GiEmploisTables::class)->name('emploi-temps');
    // Route::post('upload', [EmploiController::class, 'upload'])->name('upload');
    // Route::get('/emploi', CreateEmplois::class)->name('etudiant.emploi');

});




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



