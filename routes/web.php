<?php

use App\Http\Controllers\AnneeUnivController;
use App\Http\Controllers\AttestationController;
use App\Http\Controllers\AttestationTypeController;
use App\Http\Controllers\DepartementsetudesController;
use App\Http\Controllers\EmploisController;
use App\Http\Controllers\EnseignantsController;
use App\Http\Controllers\EtudesController;
use App\Http\Controllers\NiveauxetudesController;
use App\Http\Controllers\PrintAttestationController;
use App\Http\Controllers\PrintBadgeController;
use App\Http\Controllers\ProgrammesetudesController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ScolariteController;
use App\Http\Controllers\SemestresController;
use App\Http\Controllers\ServiceController;
use App\Livewire\Departements\CFM\CfmAjoutMatieres;
use App\Livewire\Departements\CFM\CfmEditMatieres;
use App\Livewire\Departements\CFM\CfmEditNotes;
use App\Livewire\Departements\CFM\CfmEnregistrementNote;
use App\Livewire\Departements\CFM\CfmEnseignantsTables;
use App\Livewire\Departements\CFM\CfmEtudiantsTables;
use App\Livewire\Departements\CFM\CfmInscriptionsTables;
use App\Livewire\Departements\CFM\CfmMatieresTables;
use App\Livewire\Departements\CFM\CfmNoteEtudiantsMatieres;
use App\Livewire\Departements\CFM\CfmNotesEtudiantsSemestre;
use App\Livewire\Departements\CFM\CfmPlanificationCoursTables;
use App\Livewire\Departements\GI\GiAjoutMatieres;
use App\Livewire\Departements\GI\GiEditMatieres;
use App\Livewire\Departements\GI\GiEditNotes;
use App\Livewire\Departements\GI\GiEnregistrementNote;
use App\Livewire\Departements\GI\GiEnseignantsTables;
use App\Livewire\Departements\GI\GiEtudiantsTables;
use App\Livewire\Departements\GI\GiInscriptionsTables;
use App\Livewire\Departements\GI\GiMatieresTables;
use App\Livewire\Departements\GI\GiNoteEtudiantsMatieres;
use App\Livewire\Departements\GI\GiNotesEtudiantsSemestre;
use App\Livewire\Departements\GI\GiPlanificationCoursTables;
use App\Livewire\Departements\IMP\ImpAjoutMatieres;
use App\Livewire\Departements\IMP\ImpEditMatieres;
use App\Livewire\Departements\IMP\ImpEditNotes;
use App\Livewire\Departements\IMP\ImpEnregistrementNote;
use App\Livewire\Departements\IMP\ImpEnseignantsTables;
use App\Livewire\Departements\IMP\ImpEtudiantsTables;
use App\Livewire\Departements\IMP\ImpInscriptionsTables;
use App\Livewire\Departements\IMP\ImpMatieresTables;
use App\Livewire\Departements\IMP\ImpNoteEtudiantsMatieres;
use App\Livewire\Departements\IMP\ImpNotesEtudiantsSemestre;
use App\Livewire\Departements\IMP\ImpPlanificationCoursTables;
use App\Livewire\Departements\SE\SeAjoutMatieres;
use App\Livewire\Departements\SE\SeEditMatieres;
use App\Livewire\Departements\SE\SeEditNotes;
use App\Livewire\Departements\SE\SeEnregistrementNote;
use App\Livewire\Departements\SE\SeEnseignantsTables;
use App\Livewire\Departements\SE\SeEtudiantsTables;
use App\Livewire\Departements\SE\SeInscriptionsTables;
use App\Livewire\Departements\SE\SeMatieresTables;
use App\Livewire\Departements\SE\SeNoteEtudiantsMatieres;
use App\Livewire\Departements\SE\SeNotesEtudiantsSemestre;
use App\Livewire\Departements\SE\SePlanificationCoursTables;
use App\Livewire\Departements\TEB\TebAjoutMatieres;
use App\Livewire\Departements\TEB\TebEditMatieres;
use App\Livewire\Departements\TEB\TebEditNotes;
use App\Livewire\Departements\TEB\TebEnregistrementNote;
use App\Livewire\Departements\TEB\TebEnseignantsTables;
use App\Livewire\Departements\TEB\TebEtudiantsTables;
use App\Livewire\Departements\TEB\TebInscriptionsTables;
use App\Livewire\Departements\TEB\TebMatieresTables;
use App\Livewire\Departements\TEB\TebNoteEtudiantsMatieres;
use App\Livewire\Departements\TEB\TebNotesEtudiantsSemestre;
use App\Livewire\Departements\TEB\TebPlanificationCoursTables;
use App\Livewire\Departements\TL\TlAjoutMatieres;
use App\Livewire\Departements\TL\TlEditMatieres;
use App\Livewire\Departements\TL\TlEditNotes;
use App\Livewire\Departements\TL\TlEnregistrementNote;
use App\Livewire\Departements\TL\TlEnseignantsTables;
use App\Livewire\Departements\TL\TlEtudiantsTables;
use App\Livewire\Departements\TL\TlInscriptionsTables;
use App\Livewire\Departements\TL\TlMatieresTables;
use App\Livewire\Departements\TL\TlNoteEtudiantsMatieres;
use App\Livewire\Departements\TL\TlNotesEtudiantsSemestre;
use App\Livewire\Departements\TL\TlPlanificationCoursTables;
use App\Livewire\Departements\GI\GIEnseignantsCreate;
use App\Livewire\Departements\GI\GIEnseignantsEdit;
use App\Livewire\Departements\GI\GIEnseignantsList;
use App\Livewire\Departements\GI\GIEnseignantsShow;
use App\Livewire\Departements\GI\GIInformationsCreate;
use App\Livewire\Departements\GI\GIInformationsEdit;
use App\Livewire\Departements\GI\GIInformationsList;
use App\Livewire\Departements\GI\GIInformationsShow;
use App\Livewire\Scolarite\EditEtudiant;
use App\Livewire\Scolarite\EditInscription;
use App\Livewire\Scolarite\EtudiantTables;
use App\Livewire\Scolarite\InscriptionEtudiant;
use App\Livewire\Scolarite\InscriptionEtudiantNonOriente;
use App\Livewire\Scolarite\InscriptionTables;
use App\Livewire\Scolarite\ReinscriptionEtudiant;
use App\Livewire\Scolarite\ViewDocuments;
use App\Models\Enseignant;

use function Livewire\store;
use Illuminate\Support\Facades\Route;

/* Routes added by thd */
// scolarite
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
    Route::get('/inscription/nonOriente', InscriptionEtudiantNonOriente::class)->name('scolarite.inscriptionnonOriente');
    Route::get('/listeinscritsetreinscrits', InscriptionTables::class)->name('inscriptionetreinscription.index');
    Route::get('/reinscription', ReinscriptionEtudiant::class)->name('scolarite.reinscription');
    Route::get('/inscritption/edit/{inscription}', EditInscription::class)->name('scolarite.inscription.edit');
    Route::get('/etudiants', EtudiantTables::class)->name('scolarite.orientation');
    Route::get('/etudiant/edit/{etudiant}', EditEtudiant::class)->name('scolarite.etudiant.edit');
    Route::get('/etudiant/documents/{etudiant}', ViewDocuments::class)->name('scolarite.etudiant.documents');

    Route::get('/parametre', [ScolariteController::class, 'afficherParametre'])->name('scolarite.parametre');
    

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
    Route::get("/matieres/ajout", GiAjoutMatieres::class)->name('matiere.ajout');
    Route::get("/matieres/edit/{matiere}", GiEditMatieres::class)->name('matiere.edit');
    Route::get("/enseignants", GiEnseignantsTables::class)->name('enseignants');
    Route::get("/planification", GiPlanificationCoursTables::class)->name('planification');
    Route::get("/inscriptions", GiInscriptionsTables::class)->name('inscriptions');
    Route::get('/notes', GiEnregistrementNote::class)->name('notes');
    Route::get('/notes/matiere', GiNoteEtudiantsMatieres::class)->name('notes.matiere');
    Route::get('/notes/matiere/{note}', GiEditNotes::class)->name('notes.edit');
    Route::get('/notes/semestre', GiNotesEtudiantsSemestre::class)->name('notes.semestre');

    // pour les details des departement
    Route::get('/information', GIInformationsList::class)->name('information.list');
    Route::get('/information/create', GIInformationsCreate::class)->name('information.create');
    Route::get('/information/edit/{information}', GIInformationsEdit::class)->name('information.edit');
    Route::get('/information/show/{information}', GIInformationsShow::class)->name('information.show');
    // pour les details des enseignant
    Route::get('/enseignant', GIEnseignantsList::class)->name('enseignant.list');
    Route::get('/enseignant/create', GIEnseignantsCreate::class)->name('enseignant.create');
    Route::get('/enseignant/edit/{enseignant}', GIEnseignantsEdit::class)->name('enseignant.edit');
    Route::get('/enseignant/show/{enseignant}', GIEnseignantsShow::class)->name('enseignant.show');
    Route::delete('/enseignant/destroy/{enseignant}', [GIEnseignantsShow::class, 'destroy'])->name('enseignant.destroy');
 
});

Route::prefix('scienceenergie')->name("scienceenergie.")->group(function(){
    Route::get("/etudiants", SeEtudiantsTables::class)->name('etudiants');
    Route::get("/matieres", SeMatieresTables::class)->name('matieres');
    Route::get("/matieres/ajout", SeAjoutMatieres::class)->name('matiere.ajout');
    Route::get("/matieres/edit/{matiere}", SeEditMatieres::class)->name('matiere.edit');
    Route::get("/enseignants", SeEnseignantsTables::class)->name('enseignants');
    Route::get("/planification", SePlanificationCoursTables::class)->name('planification');
    Route::get("/inscriptions", SeInscriptionsTables::class)->name('inscriptions');
    Route::get('/notes', SeEnregistrementNote::class)->name('notes');
    Route::get('/notes/matiere', SeNoteEtudiantsMatieres::class)->name('notes.matiere');
    Route::get('/notes/matiere/{note}', SeEditNotes::class)->name('notes.edit');
    Route::get('/notes/semestre', SeNotesEtudiantsSemestre::class)->name('notes.semestre');
});

Route::prefix('imp')->name("imp.")->group(function(){
    Route::get("/etudiants", ImpEtudiantsTables::class)->name('etudiants');
    Route::get("/matieres", ImpMatieresTables::class)->name('matieres');
    Route::get("/matieres/ajout", ImpAjoutMatieres::class)->name('matiere.ajout');
    Route::get("/matieres/edit/{matiere}", ImpEditMatieres::class)->name('matiere.edit');
    Route::get("/enseignants", ImpEnseignantsTables::class)->name('enseignants');
    Route::get("/planification", ImpPlanificationCoursTables::class)->name('planification');
    Route::get("/inscriptions", ImpInscriptionsTables::class)->name('inscriptions');
    Route::get('/notes', ImpEnregistrementNote::class)->name('notes');
    Route::get('/notes/matiere', ImpNoteEtudiantsMatieres::class)->name('notes.matiere');
    Route::get('/notes/matiere/{note}', ImpEditNotes::class)->name('notes.edit');
    Route::get('/notes/semestre', ImpNotesEtudiantsSemestre::class)->name('notes.semestre');
});

Route::prefix('teb')->name("teb.")->group(function(){
    Route::get("/etudiants", TebEtudiantsTables::class)->name('etudiants');
    Route::get("/matieres", TebMatieresTables::class)->name('matieres');
    Route::get("/matieres/ajout", TebAjoutMatieres::class)->name('matiere.ajout');
    Route::get("/matieres/edit/{matiere}", TebEditMatieres::class)->name('matiere.edit');
    Route::get("/enseignants", TebEnseignantsTables::class)->name('enseignants');
    Route::get("/planification", TebPlanificationCoursTables::class)->name('planification');
    Route::get("/inscriptions", TebInscriptionsTables::class)->name('inscriptions');
    Route::get('/notes', TebEnregistrementNote::class)->name('notes');
    Route::get('/notes/matiere', TebNoteEtudiantsMatieres::class)->name('notes.matiere');
    Route::get('/notes/matiere/{note}', TebEditNotes::class)->name('notes.edit');
    Route::get('/notes/semestre', TebNotesEtudiantsSemestre::class)->name('notes.semestre');
});

Route::prefix('cfm')->name("cfm.")->group(function(){
    Route::get("/etudiants", CfmEtudiantsTables::class)->name('etudiants');
    Route::get("/matieres", CfmMatieresTables::class)->name('matieres');
    Route::get("/matieres/ajout", CfmAjoutMatieres::class)->name('matiere.ajout');
    Route::get("/matieres/edit/{matiere}", CfmEditMatieres::class)->name('matiere.edit');
    Route::get("/enseignants", CfmEnseignantsTables::class)->name('enseignants');
    Route::get("/planification", CfmPlanificationCoursTables::class)->name('planification');
    Route::get("/inscriptions", CfmInscriptionsTables::class)->name('inscriptions');
    Route::get('/notes', CfmEnregistrementNote::class)->name('notes');
    Route::get('/notes/matiere', CfmNoteEtudiantsMatieres::class)->name('notes.matiere');
    Route::get('/notes/matiere/{note}', CfmEditNotes::class)->name('notes.edit');
    Route::get('/notes/semestre', CfmNotesEtudiantsSemestre::class)->name('notes.semestre');
});

Route::prefix('techniquelaboratoire')->name("tl.")->group(function(){
    Route::get("/etudiants", TlEtudiantsTables::class)->name('etudiants');
    Route::get("/matieres", TlMatieresTables::class)->name('matieres');
    Route::get("/matieres/ajout", TlAjoutMatieres::class)->name('matiere.ajout');
    Route::get("/matieres/edit/{matiere}", TlEditMatieres::class)->name('matiere.edit');
    Route::get("/enseignants", TlEnseignantsTables::class)->name('enseignants');
    Route::get("/planification", TlPlanificationCoursTables::class)->name('planification');
    Route::get("/inscriptions", TlInscriptionsTables::class)->name('inscriptions');
    Route::get('/notes', TlEnregistrementNote::class)->name('notes');
    Route::get('/notes/matiere', TlNoteEtudiantsMatieres::class)->name('notes.matiere');
    Route::get('/notes/matiere/{note}', TlEditNotes::class)->name('notes.edit');
    Route::get('/notes/semestre', TlNotesEtudiantsSemestre::class)->name('notes.semestre');
});
// /* FIN Routes des interfaces des departements */
//     Route::get('/notes', EnregistrementNote::class)->name('notes');
//     Route::get('/notes/matiere', NoteEtudiantsMatieres::class)->name('notes.matiere');
//     Route::get('/notes/semestre', NotesEtudiantsSemestre::class)->name('notes.semestre');
//     // pour les details des departement
//     Route::get('/information', InformationDepartementList::class)->name('information.list');
//     Route::get('/information/create', InformationDepartementCreate::class)->name('information.create');
//     Route::get('/information/edit/{information}', InformationDepartementEdit::class)->name('information.edit');
//     Route::get('/information/show/{information}', InformationDepartementShow::class)->name('information.show');
//     // pour les details des enseignant
//     Route::get('/enseignant', EnseignantTable::class)->name('enseignant.list');
//     Route::get('/enseignant/create', EnseignantCreate::class)->name('enseignant.create');
//     Route::get('/enseignant/edit/{enseignant}', EnseignantEdit::class)->name('enseignant.edit');
//     Route::get('/enseignant/show/{enseignant}', EnseignantShow::class)->name('enseignant.show');
//     Route::delete('/enseignant/destroy/{enseignant}', [EnseignantShow::class, 'destroy'])->name('enseignant.destroy');

//     // route pour emploi
//     // Route::get('/emploi-temps', GiEmploisTables::class)->name('emploi-temps');
//     // Route::post('upload', [EmploiController::class, 'upload'])->name('upload');
//     // Route::get('/emploi', CreateEmplois::class)->name('etudiant.emploi');

// });




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



