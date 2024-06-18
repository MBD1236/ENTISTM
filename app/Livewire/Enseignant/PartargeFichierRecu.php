<?php

namespace App\Livewire\Enseignant;

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

    #[Layout("components.layouts.template-enseignant")]
    public function render()
    {
        $serviceId = Auth::user()->service_id;
        $partages = PartageFile::query()->where('service_id', $serviceId); //fichier partagés
        
        $services = Service::all();
        if ($this->service_id)
            $partages = $partages->where('service_id', $this->service_id);

        return view('livewire.enseignant.partarge-fichier-recu', [
            'services' => $services,
            'partages' => $partages->paginate(15)
        ]);
    }
}
