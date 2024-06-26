<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AnneeUnivController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AttestationController;
use App\Http\Controllers\AttestationTypeController;
use App\Http\Controllers\Auth\CreerCompteController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ComptabiliteController;
use App\Http\Controllers\ComptabiliteParametreController;
use App\Http\Controllers\ComptabiliteRecuController;
use App\Http\Controllers\DepartementsetudesController;
use App\Http\Controllers\EmploisController;
use App\Http\Controllers\EnseignantsController;
use App\Http\Controllers\EtudesController;
use App\Http\Controllers\FrontAdminController;
use App\Http\Controllers\FrontenseignantController;
use App\Http\Controllers\FrontProgrammeController;
use App\Http\Controllers\FrontserviceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NiveauxetudesController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PrintAttestationController;
use App\Http\Controllers\PrintBadgeController;
use App\Http\Controllers\ProgrammesetudesController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RegisterController as ControllersRegisterController;
use App\Http\Controllers\ScolariteController;
use App\Http\Controllers\ScolaritePrintEtudiantListController;
use App\Http\Controllers\ScolariteReleveNoteController;
use App\Http\Controllers\SemestresController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TemoignagesController;
use App\Livewire\Administrateur\AnneeUniversitairesTables;
use App\Livewire\Administrateur\DepartementsTables;
use App\Livewire\Administrateur\NiveauxTables;
use App\Livewire\Administrateur\ProgrammesTables;
use App\Livewire\Administrateur\PromotionsTables;
use App\Livewire\Administrateur\RolesTables;
use App\Livewire\Administrateur\SemestresTables;
use App\Livewire\Administrateur\UtilisateursTables;
use App\Livewire\Billeterie\BilleterieCreate;
use App\Livewire\Billeterie\BilleterieEdit;
use App\Livewire\Billeterie\BilleterieList;
use App\Livewire\Billeterie\BilleteriePrint;
use App\Livewire\Departements\CFM\CfmAjoutMatieres;
use App\Livewire\Departements\CFM\CfmEditMatieres;
use App\Livewire\Departements\CFM\CfmEditNotes;
use App\Livewire\Departements\CFM\CfmEnregistrementNote;
use App\Livewire\Departements\CFM\CfmEnseignantsCreate;
use App\Livewire\Departements\CFM\CfmEnseignantsEdit;
use App\Livewire\Departements\CFM\CfmEnseignantsTables;
use App\Livewire\Departements\CFM\CfmEtudiantsTables;
use App\Livewire\Departements\CFM\CfmInformationsCreate;
use App\Livewire\Departements\CFM\CfmInformationsEdit;
use App\Livewire\Departements\CFM\CfmInformationsList;
use App\Livewire\Departements\CFM\CfmInformationsShow;
use App\Livewire\Departements\CFM\CfmInscriptionsTables;
use App\Livewire\Departements\CFM\CfmMatieresTables;
use App\Livewire\Departements\CFM\CfmNoteEtudiantsMatieres;
use App\Livewire\Departements\CFM\CfmNotesEtudiantsSemestre;
use App\Livewire\Departements\CFM\CfmPlanificationCoursTables;
use App\Livewire\Departements\GI\GiAjoutMatieres;
use App\Livewire\Departements\GI\GiEditMatieres;
use App\Livewire\Departements\GI\GiEditNotes;
use App\Livewire\Departements\GI\GIEmploiImport;
use App\Livewire\Departements\GI\GIEmploiTemps;
use App\Livewire\Departements\GI\GiEnregistrementNote;
use App\Livewire\Departements\GI\GIEnseignantsCreate;
use App\Livewire\Departements\GI\GIEnseignantsEdit;
use App\Livewire\Departements\GI\GIEnseignantsList;
use App\Livewire\Departements\GI\GIEnseignantsShow;
use App\Livewire\Departements\GI\GiEtudiantsTables;
use App\Livewire\Departements\GI\GIInformationsCreate;
use App\Livewire\Departements\GI\GIInformationsEdit;
use App\Livewire\Departements\GI\GIInformationsList;
use App\Livewire\Departements\GI\GIInformationsShow;
use App\Livewire\Departements\GI\GiInscriptionsTables;
use App\Livewire\Departements\GI\GiMatieresTables;
use App\Livewire\Departements\GI\GiNoteEtudiantsMatieres;
use App\Livewire\Departements\GI\GiNotesEtudiantsSemestre;
use App\Livewire\Departements\GI\GiPlanificationCoursTables;
use App\Livewire\Departements\IMP\ImpAjoutMatieres;
use App\Livewire\Departements\IMP\ImpEditMatieres;
use App\Livewire\Departements\IMP\ImpEditNotes;
use App\Livewire\Departements\IMP\ImpEnregistrementNote;
use App\Livewire\Departements\IMP\ImpEnseignantsCreate;
use App\Livewire\Departements\IMP\ImpEnseignantsEdit;
use App\Livewire\Departements\IMP\ImpEnseignantsTables;
use App\Livewire\Departements\IMP\ImpEtudiantsTables;
use App\Livewire\Departements\IMP\ImpInformationsCreate;
use App\Livewire\Departements\IMP\ImpInformationsEdit;
use App\Livewire\Departements\IMP\ImpInformationsList;
use App\Livewire\Departements\IMP\ImpInformationsShow;
use App\Livewire\Departements\IMP\ImpInscriptionsTables;
use App\Livewire\Departements\IMP\ImpMatieresTables;
use App\Livewire\Departements\IMP\ImpNoteEtudiantsMatieres;
use App\Livewire\Departements\IMP\ImpNotesEtudiantsSemestre;
use App\Livewire\Departements\IMP\ImpPlanificationCoursTables;
use App\Livewire\Departements\SE\SeAjoutMatieres;
use App\Livewire\Departements\SE\SeEditMatieres;
use App\Livewire\Departements\SE\SeEditNotes;
use App\Livewire\Departements\SE\SeEnregistrementNote;
use App\Livewire\Departements\SE\SeEnseignantsCreate;
use App\Livewire\Departements\SE\SeEnseignantsEdit;
use App\Livewire\Departements\SE\SeEnseignantsTables;
use App\Livewire\Departements\SE\SeEtudiantsTables;
use App\Livewire\Departements\SE\SeInformationsCreate;
use App\Livewire\Departements\SE\SeInformationsEdit;
use App\Livewire\Departements\SE\SeInformationsList;
use App\Livewire\Departements\SE\SeInformationsShow;
use App\Livewire\Departements\SE\SeInscriptionsTables;
use App\Livewire\Departements\SE\SeMatieresTables;
use App\Livewire\Departements\SE\SeNoteEtudiantsMatieres;
use App\Livewire\Departements\SE\SeNotesEtudiantsSemestre;
use App\Livewire\Departements\SE\SePlanificationCoursTables;
use App\Livewire\Departements\TEB\TebAjoutMatieres;
use App\Livewire\Departements\TEB\TebEditMatieres;
use App\Livewire\Departements\TEB\TebEditNotes;
use App\Livewire\Departements\TEB\TebEnregistrementNote;
use App\Livewire\Departements\TEB\TebEnseignantsCreate;
use App\Livewire\Departements\TEB\TebEnseignantsEdit;
use App\Livewire\Departements\TEB\TebEnseignantsTables;
use App\Livewire\Departements\TEB\TebEtudiantsTables;
use App\Livewire\Departements\TEB\TebInformationsCreate;
use App\Livewire\Departements\TEB\TebInformationsEdit;
use App\Livewire\Departements\TEB\TebInformationsList;
use App\Livewire\Departements\TEB\TebInformationsShow;
use App\Livewire\Departements\TEB\TebInscriptionsTables;
use App\Livewire\Departements\TEB\TebMatieresTables;
use App\Livewire\Departements\TEB\TebNoteEtudiantsMatieres;
use App\Livewire\Departements\TEB\TebNotesEtudiantsSemestre;
use App\Livewire\Departements\TEB\TebPlanificationCoursTables;
use App\Livewire\Departements\TL\TlAjoutMatieres;
use App\Livewire\Departements\TL\TlEditMatieres;
use App\Livewire\Departements\TL\TlEditNotes;
use App\Livewire\Departements\TL\TlEnregistrementNote;
use App\Livewire\Departements\TL\TlEnseignantsCreate;
use App\Livewire\Departements\TL\TlEnseignantsEdit;
use App\Livewire\Departements\TL\TlEnseignantsTables;
use App\Livewire\Departements\TL\TlEtudiantsTables;
use App\Livewire\Departements\TL\TlInformationsCreate;
use App\Livewire\Departements\TL\TlInformationsEdit;
use App\Livewire\Departements\TL\TlInformationsList;
use App\Livewire\Departements\TL\TlInformationsShow;
use App\Livewire\Departements\TL\TlInscriptionsTables;
use App\Livewire\Departements\TL\TlMatieresTables;
use App\Livewire\Departements\TL\TlNoteEtudiantsMatieres;
use App\Livewire\Departements\TL\TlNotesEtudiantsSemestre;
use App\Livewire\Departements\TL\TlPlanificationCoursTables;
use App\Livewire\Enseignant\CoursTable;
use App\Livewire\Enseignant\DashboardEnseignant;
use App\Livewire\Enseignant\DevoirsTable;
use App\Livewire\Enseignant\PublicationsTable;
use App\Livewire\Enseignant\VoirCours;
use App\Livewire\Enseignant\VoirDevoir;
use App\Livewire\Enseignant\VoirEtudiants;
use App\Livewire\Etudiant\CreateInscription;
use App\Livewire\Etudiant\CreateReinscription;
use App\Livewire\Etudiant\EtudiantCours;
use App\Livewire\Etudiant\EtudiantCoursTable;
use App\Livewire\Etudiant\EtudiantDevoirs;
use App\Livewire\Etudiant\InformationsTable;
use App\Livewire\Etudiant\NoteTable;
use App\Livewire\Etudiant\ViewDocuments as EtudiantViewDocuments;
use App\Livewire\Scolarite\EditEtudiant;
use App\Livewire\Scolarite\EditInscription;
use App\Livewire\Scolarite\EtudiantsNotes;
use App\Livewire\Scolarite\EtudiantTables;
use App\Livewire\Scolarite\InscriptionEtudiant;
use App\Livewire\Scolarite\InscriptionEtudiantNonOriente;
use App\Livewire\Scolarite\InscriptionTables;
use App\Livewire\Scolarite\ReinscriptionEtudiant;
use App\Livewire\Scolarite\ReleveNote;
use App\Livewire\Scolarite\ViewDocuments;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScolaritePrintReleveController;
use App\Livewire\Administrateur\PartargeFichier as AdministrateurPartargeFichier;
use App\Livewire\Administrateur\PartargeFichierRecu as AdministrateurPartargeFichierRecu;
use App\Livewire\Billeterie\PartargeFichier as BilleteriePartargeFichier;
use App\Livewire\Billeterie\PartargeFichierRecu as BilleteriePartargeFichierRecu;
use App\Livewire\Enseignant\PartargeFichier as EnseignantPartargeFichier;
use App\Livewire\Enseignant\PartargeFichierRecu as EnseignantPartargeFichierRecu;
use App\Livewire\Etude\PartargeFichier as EtudePartargeFichier;
use App\Livewire\Etude\PartargeFichierRecu;
use App\Livewire\Etudiant\EtudiantsMatiere;
use App\Livewire\Scolarite\PartargeFichier;
use App\Livewire\Scolarite\PartargeFichier as ScolaritePartargeFichier;
use App\Livewire\Scolarite\PartargeFichierRecu as ScolaritePartargeFichierRecu;
use App\Livewire\Departements\Gi\PartargeFichier as GIPartargeFichier;
use App\Livewire\Departements\Gi\PartargeFichierRecu as GIPartargeFichierRecu;
/* Routes added by thd */

Route::prefix('admin')->middleware('admin')->name('admin.')->group(function() {
    Route::get('/roles', RolesTables::class)->name('roles');
    Route::get('/utilisateurs', UtilisateursTables::class)->name('utilisateurs');
    Route::get('/departements', DepartementsTables::class)->name('departements');
    Route::get('/programmes', ProgrammesTables::class)->name('programmes');
    Route::get('/promotions', PromotionsTables::class)->name('promotions');
    Route::get('/semestres', SemestresTables::class)->name('semestres');
    Route::get('/niveaux', NiveauxTables::class)->name('niveaux');
    Route::get('/anneeuniversitaires', AnneeUniversitairesTables::class)->name('anneeuniversitaires');

    // thd
    Route::get('dashboard', [ AdminServiceController::class, 'dashboard'])->name('dashboard');
    Route::resource("service", AdminServiceController::class)->except(["show"]);
    // pour le partage de fichier
    Route::get('/partageFichier', AdministrateurPartargeFichier::class)->name('partagefile');
    Route::get('/partageFichier/recu', AdministrateurPartargeFichierRecu::class)->name('partagefile.recu');
   
});

Route::prefix('etudiant')->middleware('etudiant')->name('etudiant.')->group(function () {
    Route::get('/accueil', InformationsTable::class)->name('accueil');
    Route::get('/inscription', CreateInscription::class)->name('inscription');
    Route::get('/reinscription', CreateReinscription::class)->name('reinscription');
    Route::get('/documents/{etudiant}', EtudiantViewDocuments::class)->name('documents');
    Route::get('/cours', EtudiantCoursTable::class)->name('cours');
    Route::get('/note', NoteTable::class)->name('notes');
    Route::get('/cours/{cour}', EtudiantCours::class)->name('voir.cours');
    Route::get('/devoir/{devoir}', EtudiantDevoirs::class)->name('voir.devoir');
    Route::get('/matieres', EtudiantsMatiere::class)->name('matieres');
});

/* Route de l'enseignant */
Route::prefix('enseignant')->name("enseignant.")->group(function () {
    Route::get('/', DashboardEnseignant::class)->name('accueil');
    Route::get('/cours', CoursTable::class)->name('cours');
    Route::get('/cours/{cour}', VoirCours::class)->name('cours.voir');
    Route::get('/publications', PublicationsTable::class)->name('publications');
    Route::get('/publication/{publication}', VoirEtudiants::class)->name('voir.etudiant');
    Route::get('/devoirs', DevoirsTable::class)->name('devoirs');
    Route::get('/devoir/{devoir}', VoirDevoir::class)->name('voir.devoir');

    // pour le partage de fichier
    Route::get('/partageFichier', EnseignantPartargeFichier::class)->name('partagefile');
    Route::get('/partageFichier/recu', EnseignantPartargeFichierRecu::class)->name('partagefile.recu');

});

Route::prefix('front')->group(function () {
    Route::get('/accueil', [AccueilController::class, 'accueil'])->name('front.accueil');
    Route::get('/admin', [FrontAdminController::class, 'index'])->middleware('front')->name('front.admin');

    Route::prefix('articles')->group(function () {
        Route::get('/', [ArticlesController::class, 'index'])->name('articles.index');
        Route::post('/', [ArticlesController::class, 'store'])->name('articles.store');
        Route::get('/show', [ArticlesController::class, 'show'])->name('articles.show');
        Route::get('/edit/{article}', [ArticlesController::class, 'edit'])->name('articles.edit');
        Route::put('/update/{article}', [ArticlesController::class, 'update'])->name('articles.update');
        Route::get('/delete/{article}', [ArticlesController::class, 'delete'])->name('articles.delete');
    });

    Route::prefix('newsletter')->group(function () {
        Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');
        Route::get('/unsubscribe/{email}', [NewsletterController::class, 'unsubscribe'])->name('unsubscribe');
        Route::get('/create-newsletter', [NewsletterController::class, 'create'])->name('create.newsletter');
        Route::get('/show-newsletter', [NewsletterController::class, 'show'])->name('show.newsletter');
        Route::post('/send-newsletter', [NewsletterController::class, 'sendNewsletter'])->name('send.newsletter');
    });

    Route::prefix('services')->group(function () {
        Route::get('/', [FrontserviceController::class, 'index'])->name('frontservice.index');
        Route::post('/', [FrontserviceController::class, 'store'])->name('frontservice.store');
        Route::get('/show', [FrontserviceController::class, 'show'])->name('frontservice.show');
        Route::get('/edit/{frontservice}', [FrontserviceController::class, 'edit'])->name('frontservice.edit');
        Route::put('/update/{frontservice}', [FrontserviceController::class, 'update'])->name('frontservice.update');
        Route::get('/delete/{frontservice}', [FrontserviceController::class, 'delete'])->name('frontservice.delete');
    });

    Route::prefix('programmes')->group(function () {
        Route::get('/', [FrontProgrammeController::class, 'index'])->name('frontprogramme.index');
        Route::post('/', [FrontProgrammeController::class, 'store'])->name('frontprogramme.store');
        Route::get('/show', [FrontProgrammeController::class, 'show'])->name('frontprogramme.show');
        Route::get('/edit/{frontProgramme}', [FrontProgrammeController::class, 'edit'])->name('frontprogramme.edit');
        Route::put('/update/{frontProgramme}', [FrontProgrammeController::class, 'update'])->name('frontprogramme.update');
        Route::get('/delete/{frontProgramme}', [FrontProgrammeController::class, 'delete'])->name('frontprogramme.delete');
    });

    Route::prefix('enseignants')->group(function () {
        Route::get('/', [FrontenseignantController::class, 'index'])->name('frontenseignants.index');
        Route::post('/', [FrontenseignantController::class, 'store'])->name('frontenseignants.store');
        Route::get('/show', [FrontenseignantController::class, 'show'])->name('frontenseignants.show');
        Route::get('/edit/{frontenseignant}', [FrontenseignantController::class, 'edit'])->name('frontenseignants.edit');
        Route::put('/update/{frontenseignant}', [FrontenseignantController::class, 'update'])->name('frontenseignants.update');
        Route::get('/delete/{frontenseignant}', [FrontenseignantController::class, 'delete'])->name('frontenseignants.delete');
    });

    Route::prefix('galeries')->group(function () {
        Route::get('/', [PhotoController::class, 'index'])->name('photos.index');
        Route::post('/', [PhotoController::class, 'store'])->name('photos.store');
        Route::get('/show', [PhotoController::class, 'show'])->name('photos.show');
        Route::get('/edit/{photo}', [PhotoController::class, 'edit'])->name('photos.edit');
        Route::put('/update/{photo}', [PhotoController::class, 'update'])->name('photos.update');
        Route::get('/delete/{photo}', [PhotoController::class, 'delete'])->name('photos.delete');
        Route::delete('/photos/deleteAll', [PhotoController::class, 'deleteAll'])->name('photos.deleteAll');
    });

    Route::prefix('temoignages')->group(function () {
        Route::get('/', [TemoignagesController::class, 'index'])->name('temoignages.index');
        Route::post('/', [TemoignagesController::class, 'store'])->name('temoignages.store');
        Route::get('/show', [TemoignagesController::class, 'show'])->name('temoignages.show');
        Route::get('/edit/{temoignage}', [TemoignagesController::class, 'edit'])->name('temoignages.edit');
        Route::put('/update/{temoignage}', [TemoignagesController::class, 'update'])->name('temoignages.update');
        Route::get('/delete/{temoignage}', [TemoignagesController::class, 'delete'])->name('temoignages.delete');
    });
});

// pour la billeterie
Route::name('billeterie.')->middleware('comptabilite')->group(function() {
    Route::get('billeterie/dashboard', [ ComptabiliteController::class, 'dashboard'])->name('dashboard');
    Route::resource("billeterie/parametre", ComptabiliteParametreController::class)->except(["show"]);
    // pour les details des departement
    Route::get('/billeterie/list', BilleterieList::class)->name('list');
    Route::get('/billeterie/create', BilleterieCreate::class)->name('create');
    Route::get('/billeterie/edit/{recu}', BilleterieEdit::class)->name('edit');
    Route::delete('/billeterie/destroy/{recu}', [BilleterieList::class, 'destroy'])->name('destroy');
    Route::get('/billeterie/print', BilleteriePrint::class)->name('print');
    Route::get('/billeterie/printRecu/{recu}', [ComptabiliteController::class, 'printRecu'])->name('printRecu');
    Route::get('/billeterie/form', [ComptabiliteRecuController::class, 'form'])->name('form');
    Route::post('/billeterie/index', [ComptabiliteRecuController::class, 'index'])->name('index');

    Route::get('/billeterie/partageFichier', BilleteriePartargeFichier::class)->name('partagefile');
    Route::get('/billeterie/partageFichier/recu', BilleteriePartargeFichierRecu ::class)->name('partagefile.recu');

});

/* fin */

/* Routes de l'interface de la scolarité */
Route::prefix('scolarite')->middleware('scolarite')->name('scolarite.')->group(function () {
    Route::get('/', [ScolariteController::class, 'index'])->name('dashboard');
    Route::get('/inscription', InscriptionEtudiant::class)->name('inscription');
    Route::get('/inscription/nonOriente', InscriptionEtudiantNonOriente::class)->name('inscriptionnonOriente');
    Route::get('/listeinscritsetreinscrits', InscriptionTables::class)->name('inscriptionetreinscription.index');
    Route::get('/reinscription', ReinscriptionEtudiant::class)->name('reinscription');
    Route::get('/inscritption/edit/{inscription}', EditInscription::class)->name('inscription.edit');
    Route::get('/etudiants', EtudiantTables::class)->name('orientation');
    Route::get('/etudiant/edit/{etudiant}', EditEtudiant::class)->name('etudiant.edit');
    Route::get('/etudiant/documents/{etudiant}', ViewDocuments::class)->name('etudiant.documents');
    Route::get('/etudiants/notes', EtudiantsNotes::class)->name('notes');

    Route::get('/parametre', [ScolariteController::class, 'afficherParametre'])->name('parametre');
    Route::get('/inscrits', [ScolariteController::class, 'inscrits'])->name('inscrits');

    // pour l'impression des etudiants inscrits et reinscrit
    Route::post('/print/index', [ScolaritePrintEtudiantListController::class, 'index'])->name('print.index');
    Route::get('/print/form', [ScolaritePrintEtudiantListController::class, 'form'])->name('print.form');
    // pour l'impression des etudiants oriente
    Route::post('/etudiant/oriente', [ScolaritePrintEtudiantListController::class, 'oriente'])->name('print.oriente');
    Route::get('/etudiant/forms', [ScolaritePrintEtudiantListController::class, 'forms'])->name('print.forms');
    // pour les releves de notes
    Route::resource("attestation", AttestationController::class)->except(["show"]);
    Route::resource("attestationType", AttestationTypeController::class)->except(["show"]);
    Route::resource("service", ServiceController::class)->except(["show"]);
    Route::get("attestation/inscription", [PrintAttestationController::class, 'attestationInscription' ])->name("attestation.inscription");
    Route::post('/fetch-students', [PrintAttestationController::class,'fetchStudents' ])->name('fetchStudents');
    Route::post('/print-attestation', [PrintAttestationController::class, 'printAttestation'])->name('printAttestation');
    // badge
    Route::get('/indexBadge', [PrintBadgeController::class, 'index'])->name('print');
    Route::post('/printBadge', [PrintBadgeController::class, 'printBadge'])->name('printBadge');
    Route::resource("releve", ScolariteReleveNoteController::class)->except(["show"]);

    // pour l'impression des releves de notes 
    Route::get('/releve/notes', [ScolaritePrintReleveController::class, 'form'])->name('print.formreleve');
    Route::post('/releve/notes/index', [ScolaritePrintReleveController::class, 'index'])->name('print.indexreleve');
    Route::get('/releve/notesAnnuel', [ScolaritePrintReleveController::class, 'releveAnnuelform'])->name('print.releveAnnuelform');
    Route::post('/releve/notes/indexAnnuel', [ScolaritePrintReleveController::class, 'releveAnnuelindex'])->name('print.releveAnnuelindex');
    // pour le partage de fichier
    Route::get('/partageFichier', ScolaritePartargeFichier::class)->name('partagefile');
    Route::get('/partageFichier/recu', ScolaritePartargeFichierRecu::class)->name('partagefile.recu');
 

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

Route::prefix('etudes')->middleware('s_etude')->group(function () {
    Route::get('/', [EtudesController::class, 'index'])->name('etudes.index');
    Route::get('/parametre', [EtudesController::class, 'afficherParametre'])->name('etudes.parametre');
    // thd
    Route::get('/partageFichier', EtudePartargeFichier::class)->name('etudes.partagefile');
    Route::get('/partageFichier/recu', PartargeFichierRecu::class)->name('etudes.partagefile.recu');

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
Route::prefix('genieinfo')->middleware('g_info')->name("genieinfo.")->group(function(){
    Route::get("/etudiants", GiEtudiantsTables::class)->name('etudiants');
    Route::get("/matieres", GiMatieresTables::class)->name('matieres');
    Route::get("/matieres/ajout", GiAjoutMatieres::class)->name('matiere.ajout');
    Route::get("/matieres/edit/{matiere}", GiEditMatieres::class)->name('matiere.edit');
    Route::get("/planification", GiPlanificationCoursTables::class)->name('planification');
    Route::get("/inscriptions", GiInscriptionsTables::class)->name('inscriptions');
    Route::get('/notes', GiEnregistrementNote::class)->name('notes');
    Route::get('/notes/matiere', GiNoteEtudiantsMatieres::class)->name('notes.matiere');
    Route::get('/notes/matiere/{note}', GiEditNotes::class)->name('notes.edit');
    Route::get('/notes/semestre', GiNotesEtudiantsSemestre::class)->name('notes.semestre');
    // pour l'empoi de temps
    Route::get('/emploiTemps', GIEmploiTemps::class)->name('emploitemps');
    Route::get('/emploiTemps/import', GIEmploiImport::class)->name('emploitemps.import');
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
    // thd
    Route::get('/partageFichier', GIPartargeFichier::class)->name('partagefile');
    Route::get('/partageFichier/recu', GIPartargeFichierRecu::class)->name('partagefile.recu');

});

Route::prefix('scienceenergie')->middleware('s_energie')->name("scienceenergie.")->group(function(){
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

    Route::get('/enseignant/create', SeEnseignantsCreate::class)->name('enseignant.create');
    Route::get('/enseignant/edit/{enseignant}', SeEnseignantsEdit::class)->name('enseignant.edit');
    Route::get('/enseignant/show/{enseignant}', GIEnseignantsShow::class)->name('enseignant.show');
    Route::delete('/enseignant/destroy/{enseignant}', [GIEnseignantsShow::class, 'destroy'])->name('enseignant.destroy');

    Route::get('/information', SeInformationsList::class)->name('information.list');
    Route::get('/information/create', SeInformationsCreate::class)->name('information.create');
    Route::get('/information/edit/{information}', SeInformationsEdit::class)->name('information.edit');
    Route::get('/information/show/{information}', SeInformationsShow::class)->name('information.show');

});

Route::prefix('imp')->middleware('imp')->name("imp.")->group(function(){
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

    Route::get('/enseignant/create', ImpEnseignantsCreate::class)->name('enseignant.create');
    Route::get('/enseignant/edit/{enseignant}', ImpEnseignantsEdit::class)->name('enseignant.edit');
    Route::get('/enseignant/show/{enseignant}', GIEnseignantsShow::class)->name('enseignant.show');
    Route::delete('/enseignant/destroy/{enseignant}', [GIEnseignantsShow::class, 'destroy'])->name('enseignant.destroy');


    Route::get('/information', ImpInformationsList::class)->name('information.list');
    Route::get('/information/create', ImpInformationsCreate::class)->name('information.create');
    Route::get('/information/edit/{information}', ImpInformationsEdit::class)->name('information.edit');
    Route::get('/information/show/{information}', ImpInformationsShow::class)->name('information.show');
});

Route::prefix('teb')->middleware('teb')->name("teb.")->group(function(){
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

    Route::get('/enseignant/edit/{enseignant}', TebEnseignantsEdit::class)->name('enseignant.edit');
    Route::get('/enseignant/create', TebEnseignantsCreate::class)->name('enseignant.create');
    Route::get('/enseignant/show/{enseignant}', GIEnseignantsShow::class)->name('enseignant.show');
    Route::delete('/enseignant/destroy/{enseignant}', [GIEnseignantsShow::class, 'destroy'])->name('enseignant.destroy');

    Route::get('/information', TebInformationsList::class)->name('information.list');
    Route::get('/information/create', TebInformationsCreate::class)->name('information.create');
    Route::get('/information/edit/{information}', TebInformationsEdit::class)->name('information.edit');
    Route::get('/information/show/{information}', TebInformationsShow::class)->name('information.show');

});

Route::prefix('cfm')->middleware('cfm')->name("cfm.")->group(function(){
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

    Route::get('/enseignant/create', CfmEnseignantsCreate::class)->name('enseignant.create');
    Route::get('/enseignant/edit/{enseignant}', CfmEnseignantsEdit::class)->name('enseignant.edit');
    Route::get('/enseignant/show/{enseignant}', GIEnseignantsShow::class)->name('enseignant.show');
    Route::delete('/enseignant/destroy/{enseignant}', [GIEnseignantsShow::class, 'destroy'])->name('enseignant.destroy');

    Route::get('/information', CfmInformationsList::class)->name('information.list');
    Route::get('/information/create', CfmInformationsCreate::class)->name('information.create');
    Route::get('/information/edit/{information}', CfmInformationsEdit::class)->name('information.edit');
    Route::get('/information/show/{information}', CfmInformationsShow::class)->name('information.show');

});

Route::prefix('techniquelaboratoire')->middleware('t_laboratoire')->name("tl.")->group(function(){
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

    Route::get('/enseignant/create', TlEnseignantsCreate::class)->name('enseignant.create');
    Route::get('/enseignant/edit/{enseignant}', TlEnseignantsEdit::class)->name('enseignant.edit');
    Route::get('/enseignant/show/{enseignant}', GIEnseignantsShow::class)->name('enseignant.show');
    Route::delete('/enseignant/destroy/{enseignant}', [GIEnseignantsShow::class, 'destroy'])->name('enseignant.destroy');


    Route::get('/information', TlInformationsList::class)->name('information.list');
    Route::get('/information/create', TlInformationsCreate::class)->name('information.create');
    Route::get('/information/edit/{information}', TlInformationsEdit::class)->name('information.edit');
    Route::get('/information/show/{information}', TlInformationsShow::class)->name('information.show');
});
// /* FIN Routes des interfaces des departements */




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

Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'deconnection']);



