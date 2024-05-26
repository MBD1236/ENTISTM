<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



### la localisation ou l'internationnalisation
# php artisan lang:publish (pour publier l'anglais)
# composer require laravel-lang/common --dev --ignore-platform-reqs (pour installer le package)
# php artisan lang:add fr (pour ajouter une langue)
# et puis dans le fichier config/app.php on modifie le locale = fr

php artisan make:migration CreatePromotionsTable
php artisan make:migration CreateNiveauxTable
php artisan make:migration CreateSemestresTable
php artisan make:migration CreateSessionsTable
php artisan make:migration CreateDepartementsTable
php artisan make:migration CreateMatieresTable

php artisan make:model Promotion

php artisan make:controller ModuleEtudiant/PromotionController -r


<!-- DEPARTEMENT -->
php artisan make:model Departement -m
php artisan make:controller ModuleEtudiant/DepartementController -r
php artisan make:request ModuleEtudiant/DepartementResquest
<!-- ENSEIGNANT -->
php artisan make:model Enseignant -m
php artisan make:controller ModuleEtudiant/EnseignantController -r
php artisan make:request ModuleEtudiant/EnseignantResquest


<!-- resolution des problemes -->
<!-- supprimer le dossier vendor -->
#   rmdir /s /q vendor 
<!-- réinstallez les dépendances Composer -->
#   composer install
<!-- apres relancer -->
#   php artisan serve
<!-- effacer la cache -->
#   composer clear-cache
<!-- si le probleme persiste metre a jour le composer vers la derniers version -->
#   composer self-update


<!-- pour installer livewire -->
##  composer require livewire/livewire
##  php artisan livewire:publish
#   apres ajouter ce qui est en dessous dans le fichier config/app.php
'providers' => [
    ...
    \Livewire\LivewireServiceProvider::class,
],


<!-- pour installer breeze -->
##  composer require laravel/breeze
##  php artisan breeze:install blade
##  configuration de l'authentification
APP_URL=http://localhost:8000
FRONTEND_URL=http://localhost:3000


## ALTER TABLE departements ADD COLUMN photo VARCHAR(256) NOT NULL AFTER description;
## ALTER TABLE utilisateurs CHANGE nom_prenom nom_complet VARCHAR(255);
## RENAME TABLE clients TO utilisateurs;

<!-- pour l'import des notes -->
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\Programme;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        return view('notes.index');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $path = $request->file('file')->getRealPath();
        $data = Excel::load($path)->get();

        foreach ($data as $row) {
            $etudiant = Etudiant::firstOrCreate(['nom' => $row->etudiant]);
            $matiere = Matiere::firstOrCreate(['nom' => $row->matiere]);
            $programme = Programme::firstOrCreate(['nom' => $row->programme]);

            // Utilisez les identifiants pour insérer les données dans la table principale
            $note = new Note();
            $note->etudiant_id = $etudiant->id;
            $note->matiere_id = $matiere->id;
            $note->programme_id = $programme->id;
            $note->note = $row->note;
            $note->save();
        }

        return 'Les notes ont été importées avec succès.';
    }
}

## Alimantations(nom, dateCreation, dateExpiration, reff, photo) et produit cosmetiques (nom, dateCreation, dateExpiration, reff, type(rouge a levre, teint))

## Pieces(nom, type, dateAchat) et Engein roulants(nom, type, model, dateAchat et etatActuel )

## shoping/matelas/lits/fotaille(nom, model, taille, dateAchat et photo) et outils electroniques (nom, model, dateCreation, categorie(pc, smart phone) et une table lie a outils electronique qui outils technique(RAM, autonomie, capacite, ecran))

## frigot et librairie(nom et type)

## outil de construciton(nom, type(beton, boit, acier),dimension)

## fourniture(nom, type, model)


## pour la creations des lien symboliques (php artisan storage:link)

{{-- {{asset('storage/'.$information->photo) }} --}}
{{-- {{ dd(Storage::url($information->photo)) }} --}}
<!-- les deux facon de recuperer la photo -->
<img width="40px" height="30px" src="{{asset('storage/informations/'.$information->photo) }}" alt="PHOTO">
<img src="{{ Storage::url($information->photo) }}" alt="Photo du département" srcset="">


#120a5c