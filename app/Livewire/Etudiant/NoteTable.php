<?php

namespace App\Livewire\Etudiant;

use App\Models\Inscription;
use App\Models\Niveau;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

class NoteTable extends Component
{
    #[Layout("components.layouts.template-etudiant")]
    public function render()
    {
        $mat = Auth::user()->matricule;
        $e = Inscription::whereHas('etudiant', function($n) use($mat){
            $n->where('ine', $mat);
        })->latest()->first();
        $licence1 = collect();
        $licence2 = collect();
        $licence3 = collect();
        $licence4 = collect();
        if ($e) {
            $niveau = Niveau::where('id', $e->niveau_id)->pluck('niveau')->first();
            
            if ($niveau === "Licence 1") {
                $licence1 = Note::whereHas('inscription', function($n) use($mat){
                    $n->whereHas('etudiant', function($n) use($mat){
                        $n->where('ine', $mat);
                    });
                })->whereHas('matiere', function($n) {
                    $n->whereHas('semestre', function($n) {
                        $n->where('semestre', 'Semestre 1')->orWhere('semestre', 'Semestre 2');
                    });
                })->get();
                
            }elseif($niveau == 'Licence 2') {
                $licence2 = Note::whereHas('inscription', function($n) use($mat){
                    $n->whereHas('etudiant', function($n) use($mat){
                        $n->where('ine', $mat);
                    });
                })->whereHas('matiere', function($n) {
                    $n->whereHas('semestre', function($n) {
                        $n->where('semestre', 'Semestre 3')->orWhere('semestre', 'Semestre 4');
                    });
                })->get();
            }elseif($niveau == 'Licence 3') {
                $licence3 = Note::whereHas('inscription', function($n) use($mat){
                    $n->whereHas('etudiant', function($n) use($mat){
                        $n->where('ine', $mat);
                    });
                })->whereHas('matiere', function($n) {
                    $n->whereHas('semestre', function($n) {
                        $n->where('semestre', 'Semestre 5')->orWhere('semestre', 'Semestre 6');
                    });
                })->get();
            }elseif($niveau == 'Licence 4') {
                $licence4 = Note::whereHas('inscription', function($n) use($mat){
                    $n->whereHas('etudiant', function($n) use($mat){
                        $n->where('ine', $mat);
                    });
                })->whereHas('matiere', function($n) {
                    $n->whereHas('semestre', function($n) {
                        $n->where('semestre', 'Semestre 7')->orWhere('semestre', 'Semestre 8');
                    });
                })->get();
            }
    
             return view('livewire.etudiant.note-table',[
                'licenceOne' =>$licence1,
                'licenceTwo' =>$licence2,
                'licenceThree' =>$licence3,
                'licenceFour' =>$licence4,
             ]);
        }
        
        
    }


}

