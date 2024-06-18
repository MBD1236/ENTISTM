<?php

namespace App\Livewire\Etude;

use App\Models\PartageFile;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PartargeFichierRecu extends Component
{
    use WithFileUploads;
    use WithPagination;
    public PartageFile $partage;

    public $fichier;
    public $service_id;

    #[Layout("components.layouts.template-etudes")]    
    public function render()
    {
        $userId = Auth::user()->id;
        
        $services = Service::all();
        $partages = PartageFile::query()->where('user_id', $userId); //fichier partagés
        if ($this->service_id)
            $partages = $partages->where('service_id', $this->service_id);

        return view('livewire.etude.partarge-fichier-recu', [
            'services' => $services,
            'partages' => $partages->paginate(15)
        ]);
    }
}
