<?php

namespace App\Livewire\Billeterie;

use App\Models\Recu;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BilleterieList extends Component
{
    // methode de suppression
    public function destroy($id)
    {
        $recu = Recu::findOrFail($id);
        $recu->delete();
        return redirect()->route('billeterie.list')->with('danger', 'Réçu supprimé avec succès!');
    }

    #[Layout("components.layouts.template-guichet")]
    public function render()
    {
        return view('livewire.billeterie.billeterie-list', [
            'recus' => Recu::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}
