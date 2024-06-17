<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-graduation-cap me-1"></i>Visualisation des documents de l'étudiant</h1>
    </div>
    <div class="table-responsive-sm">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">Nom</th>
                    <th class="text-center">Prénom</th>
                    <th class="text-center">Ine</th>
                    <th class="text-center">Diplôme</th>
                    <th class="text-center">Releve Notes</th>
                    <th class="text-center">Certificat Nationalité</th>
                    <th class="text-center">Certificat Médical</th>
                    <th class="text-center">Extrait Naissance</th>
                    <th class="text-center">Photo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center fw-bold">{{ $etudiant->nom }}</td>
                    <td class="text-center fw-bold">{{ $etudiant->prenom }}</td>
                    <td class="text-center fw-bold">{{ $etudiant->ine }}</td>  
                    <td class="text-center"> 
                        @if($diplomeVisible)
                            <button title="Fermer" wire:click="toggleDiplomeVisibility" class="btn-modal" style="height:30px; width:40px; text-align:center; padding:0px 5px 0px 5px"><i class="fa fa-close  fs-5"></i></button>
                        @else
                            <button title="Afficher le diplôme" wire:click="toggleDiplomeVisibility" class="btn-modal" style="height:30px; width:40px; text-align:center; padding:0px 5px 0px 5px"><i class="fa fa-eye  fs-5"></i></button>
                        @endif
                    </td>
                    <td class="text-center"> 
                        @if($relevenotesVisible)
                            <button title="Fermer" wire:click="toggleReleveNotesVisibility" class="btn-modal" style="height:30px; width:40px; text-align:center; padding:0px 5px 0px 5px"><i class="fa fa-close  fs-5"></i></button>
                        @else
                            <button title="Afficher le releve de note du bac" wire:click="toggleReleveNotesVisibility" class="btn-modal" style="height:30px; width:40px; text-align:center; padding:0px 5px 0px 5px"><i class="fa fa-eye  fs-5"></i></button>
                        @endif
                    </td>
                    <td class="text-center"> 
                        @if($certificatnationaliteVisible)
                            <button title="Fermer" wire:click="toggleCertificatNationaliteVisibility" class="btn-modal" style="height:30px; width:40px; text-align:center; padding:0px 5px 0px 5px"><i class="fa fa-close  fs-5"></i></button>
                        @else
                            <button title="Afficher le certificat de nationalite" wire:click="toggleCertificatNationaliteVisibility" class="btn-modal" style="height:30px; width:40px; text-align:center; padding:0px 5px 0px 5px"><i class="fa fa-eye  fs-5"></i></button>
                        @endif
                    </td>
                    <td class="text-center"> 
                        @if($certificatmedicalVisible)
                            <button title="Fermer" wire:click="toggleCertificatMedicalVisibility" class="btn-modal" style="height:30px; width:40px; text-align:center; padding:0px 5px 0px 5px"><i class="fa fa-close  fs-5"></i></button>
                        @else
                            <button title="Afficher le certificat medical" wire:click="toggleCertificatMedicalVisibility" class="btn-modal" style="height:30px; width:40px; text-align:center; padding:0px 5px 0px 5px"><i class="fa fa-eye fs-5"></i></button>
                        @endif
                    </td>
                    <td class="text-center"> 
                        @if($extraitnaissanceVisible)
                            <button title="Fermer" wire:click="toggleExtraitNaissanceVisibility" class="btn-modal" style="height:30px; width:40px; text-align:center; padding:0px 5px 0px 5px"><i class="fa fa-close  fs-5"></i></button>
                        @else
                            <button title="Afficher l'extrait de naissance" wire:click="toggleExtraitNaissanceVisibility" class="btn-modal" style="height:30px; width:40px; text-align:center; padding:0px 5px 0px 5px"><i class="fa fa-eye  fs-5"></i></button>
                        @endif
                    </td>
                    <td class="text-center"> 
                        @if($photoVisible)
                            <button title="Fermer" wire:click="togglephotoVisibility" class="btn-modal" style="height:30px; width:40px; text-align:center; padding:0px 5px 0px 5px"><i class="fa fa-close  fs-5"></i></button>
                        @else
                            <button title="Afficher la photo" wire:click="togglephotoVisibility" class="btn-modal" style="height:30px; width:40px; text-align:center; padding:0px 5px 0px 5px"><i class="fa fa-eye  fs-5"></i></button>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        @if($diplomeVisible)
            @if(Str::endsWith($etudiant->diplome, ['.pdf', '.PDF']))
                <embed src="{{ asset('storage/'.$etudiant->diplome) }}" type="application/pdf" width="100%" height="800px">
            @else
                <img class="responsive-img" src="{{asset('storage/'.$etudiant->diplome) }}" alt="">
            @endif
        @endif
        @if($relevenotesVisible)
            @if(Str::endsWith($etudiant->releve_notes, ['.pdf', '.PDF']))
                <embed src="{{ asset('storage/'.$etudiant->releve_notes) }}" type="application/pdf" width="100%" height="800px">
            @else
                <img class="responsive-img" src="{{asset('storage/'.$etudiant->releve_notes) }}" alt="">
            @endif
        @endif
        @if($certificatnationaliteVisible)
            @if(Str::endsWith($etudiant->certificat_nationalite, ['.pdf', '.PDF']))
                <embed src="{{ asset('storage/'.$etudiant->certificat_nationalite) }}" type="application/pdf" width="100%" height="800px">
            @else
                <img class="responsive-img" src="{{asset('storage/'.$etudiant->certificat_nationalite) }}" alt="">
            @endif
        @endif
        @if($certificatmedicalVisible)
            @if(Str::endsWith($etudiant->certificat_medical, ['.pdf', '.PDF']))
                <embed src="{{ asset('storage/'.$etudiant->certificat_medical) }}" type="application/pdf" width="100%" height="800px">
            @else
                <img class="responsive-img" src="{{asset('storage/'.$etudiant->certificat_medical) }}" alt="">
            @endif
        @endif
        @if($extraitnaissanceVisible)
            @if(Str::endsWith($etudiant->extrait_naissance, ['.pdf', '.PDF']))
                <embed src="{{ asset('storage/'.$etudiant->extrait_naissance) }}" type="application/pdf" width="100%" height="800px">
            @else
                <img class="responsive-img" src="{{asset('storage/'.$etudiant->extrait_naissance) }}" alt="">
            @endif
        @endif
        @if($photoVisible)
            <img class="responsive-img" src="{{asset('storage/'.$etudiant->photo) }}" alt="">
        @endif
    </div>
    
    <style>
        .responsive-img {
            width: 100%;
            height: 100%;
            object-fit: contain; /* or 'cover' depending on your preference */
        }
    </style>
</div>

