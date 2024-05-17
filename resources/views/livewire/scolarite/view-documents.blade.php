<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-graduation-cap me-1"></i>Visualisation des documents de l'étudiant</h1>
    </div>
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
                <td class="text-center">{{ $etudiant->nom }}</td>
                <td class="text-center">{{ $etudiant->prenom }}</td>
                <td class="text-center">{{ $etudiant->ine }}</td>  
                <td class="text-center"> 
                    @if($diplomeVisible)
                        <button wire:click="toggleDiplomeVisibility">Fermer</button>
                    @else
                        <button wire:click="toggleDiplomeVisibility">Voir Diplôme</button>
                    @endif
                </td>
                <td class="text-center"> 
                    @if($relevenotesVisible)
                        <button wire:click="toggleReleveNotesVisibility">Fermer</button>
                    @else
                        <button wire:click="toggleReleveNotesVisibility">Voir RN</button>
                    @endif
                </td>
                <td class="text-center"> 
                    @if($certificatnationaliteVisible)
                        <button wire:click="toggleCertificatNationaliteVisibility">Fermer</button>
                    @else
                        <button wire:click="toggleCertificatNationaliteVisibility">Voir CN</button>
                    @endif
                </td>
                <td class="text-center"> 
                    @if($certificatmedicalVisible)
                        <button wire:click="toggleCertificatMedicalVisibility">Fermer</button>
                    @else
                        <button wire:click="toggleCertificatMedicalVisibility">Voir CM</button>
                    @endif
                </td>
                <td class="text-center"> 
                    @if($extraitnaissanceVisible)
                        <button wire:click="toggleExtraitNaissanceVisibility">Fermer</button>
                    @else
                        <button wire:click="toggleExtraitNaissanceVisibility">Voir EN</button>
                    @endif
                </td>
                <td class="text-center"> 
                    @if($photoVisible)
                        <button wire:click="togglephotoVisibility">Fermer</button>
                    @else
                        <button wire:click="togglephotoVisibility">Voir Photo</button>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    <div>
        @if($diplomeVisible)
            @if(Str::endsWith($etudiant->diplome, ['.pdf', '.PDF']))
                <embed src="{{ asset('storage/'.$etudiant->diplome) }}" type="application/pdf" width="100%" height="800px">
            @else
                <img width="100%" height="800px" src="{{asset('storage/'.$etudiant->diplome) }}" alt="">
            @endif
        @endif
        @if($relevenotesVisible)
            @if(Str::endsWith($etudiant->releve_notes, ['.pdf', '.PDF']))
                <embed src="{{ asset('storage/'.$etudiant->releve_notes) }}" type="application/pdf" width="100%" height="800px">
            @else
                <img width="100%" height="800px" src="{{asset('storage/'.$etudiant->releve_notes) }}" alt="">
            @endif
        @endif
        @if($certificatnationaliteVisible)
            @if(Str::endsWith($etudiant->certificat_nationalite, ['.pdf', '.PDF']))
                <embed src="{{ asset('storage/'.$etudiant->certificat_nationalite) }}" type="application/pdf" width="100%" height="800px">
            @else
                <img width="100%" height="800px" src="{{asset('storage/'.$etudiant->certificat_nationalite) }}" alt="">
            @endif
        @endif
        @if($certificatmedicalVisible)
            @if(Str::endsWith($etudiant->certificat_medical, ['.pdf', '.PDF']))
                <embed src="{{ asset('storage/'.$etudiant->certificat_medical) }}" type="application/pdf" width="100%" height="800px">
            @else
                <img width="100%" height="800px" src="{{asset('storage/'.$etudiant->certificat_medical) }}" alt="">
            @endif
        @endif
        @if($extraitnaissanceVisible)
            @if(Str::endsWith($etudiant->extrait_naissance, ['.pdf', '.PDF']))
                <embed src="{{ asset('storage/'.$etudiant->extrait_naissance) }}" type="application/pdf" width="100%" height="800px">
            @else
                <img width="100%" height="800px" src="{{asset('storage/'.$etudiant->extrait_naissance) }}" alt="">
            @endif
        @endif
        @if($photoVisible)
                <img width="100%" height="800px" src="{{asset('storage/'.$etudiant->photo) }}" alt="">
        @endif
    </div>


</div>





