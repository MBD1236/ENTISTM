@extends('layouts.template-scolarite')

@section('content')
    <div class="card b">
        <div class="card-header card-head">
            <h1 class="bg-card text-white card-head d-flex flex-row justify-content-between">
                <div> 
                    <i class="fa fa-list me-2"></i>
                    <span>Les attestations d'inscriptions</span>
                </div>
                <div>
                    <i class="fa fa-list-ol"></i>
                    <span class="bg-card text-white card-head">{{$total}}</span>
                </div>
            </h1>
        </div>

       <div class="row px-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        @if (session('error'))
            <div id="sm" class="alert alert-danger text-center fw-bold" role="alert">
                {{ session('error') }}
            </div>
        @endif
       </div>

       <div class="card-body mt-4">
            <h2 class="label-text text-center"><i class="fa fa-print me-1"></i>Impression des attestations d'inscription </h2>
            <div class="row d-flex flex-row justify-content-center gap-1 ">   
                {{--form1 pour l'annee universitaire  --}}
                <div class="col-md-4 col-sm-12">
                    <div class="row">
                        <form id="form1" action="{{ route('scolarite.fetchStudents') }}" method="POST" class="p-0 py-1" >
                            @csrf
                            @method('post')
                            <div class="d-flex flex-column justify-content-center gap-1 px-0">
                                <div class="d-flex flex-row justify-content-between gap-1">
                                    <div>
                                        <div class="form-group">   
                                            <select name="annee_universitaire_id" class="select2  form-select border-input @error('annee_universitaire_id') is-invalid  @enderror" id="floatingannee" style="width: 130px;">
                                                @foreach ($annee_universitaires as $annee_universitaire)
                                                    <option  @selected(old('annee_universitaire_id', $annee_universitaire->session)) value="{{ $annee_universitaire->id }}">{{ $annee_universitaire->session }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('annee_universitaire_id') {{ $message }} @enderror</div>        
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">   
                                            <select name="attestation_type_id" id="floatingtype" class="form-select border-input @error('attestation_type_id') is-invalid  @enderror" type="search" style="height: 40px;">
                                                <option value="0">Type d'attesta...</option>
                                                @foreach ($attestation_types as $attestation_type)
                                                    <option  @selected(old('attestation_type_id', $attestation_type->type)) value="{{ $attestation_type->id }}">{{ ucwords(strtolower($attestation_type->type)) }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('attestation_type_id') {{ $message }} @enderror</div>        
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn-modal btn-afficher mt-1 ">
                                    <i class="fa fa-eye fs-5 me-1"></i>
                                    <span>Afficher le.s matricule.s</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
               {{-- Form2 pour les matricules --}}
                <div class="col-md-7 col-sm-12" @if (!empty($matricules)) style="display: block;" @else style="display: none;" @endif>
                    <form id="form2" action="{{ route('scolarite.printAttestation') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-md-9 col-sm-12 p-1">
                                <div class="form-group">
                                    <select id="matricules" class="select2 custom-select2 form-control border-input @error('matricules') is-invalid @enderror" name="matricules[]" style="height: 120px;" multiple>
                                        <option value="">Sélectionner le(s) matricule(s)</option>
                                        @foreach($matricules as $matricule)
                                            <option value="{{ $matricule->etudiant_id }}">{{ $matricule->ine }} - {{ $matricule->prenom }} {{ $matricule->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('matricules')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 d-flex justify-content-end p-1">
                                <button type="submit" class="btn-modal pb-2 px-3 pt-1  text-white fs-5 " style="background: #120a5c">
                                    <i class="fa fa-print fs-5 me-1"></i>
                                    <span>Imprimer</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row mt-4">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Reff</th>
                                    <th>Type</th>
                                    <th>INE</th>
                                    <th>Prénom et Nom</th>
                                    <th>Niveau</th>
                                    <th>Session</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attestations as $k => $attestation)
                                    @if ($attestation->type === 'Inscription')
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            <td>{{$attestation->reff}}</td>
                                            <td>{{$attestation->type}}</td>
                                            <td>{{$attestation->etudiant->ine}}</td>
                                            <td>{{$attestation->etudiant->prenom}} {{$attestation->etudiant->nom}}</td>
                                            <td>{{$attestation->niveau->niveau}}</td>
                                            <td>{{$attestation->annee_universitaire->session}}</td>
                                        </tr>       
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>        

        <div class="row">
            <div class="col-12">
                <ul class="pagination-rounded">
                    {{$attestations->links()}}
                </ul>
            </div>
        </div>

    </div>

    <script>
        // pour l'initialisation de select2
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Le.s matricule.s séléctionnés...',
                allowClear: true 
            });
        });
    </script>

@endsection
