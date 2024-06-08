@extends('thd-layouts.my')

@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h6 class="bg-card text-center text-white card-head">
                Liste des étudiants inscrits en {{ $programme->programme }}
                Session {{ $annee_universitaire->session }}
                @if($promotion) 
                     {{ $promotion->promotion }}
                @endif
            </h6>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row mt-4">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>INE</th>
                                <th>Prénoms</th>
                                <th>Nom</th>
                                <th>Promotion</th>
                                <th>Programme</th>
                                <th>Session</th>
                                <th>Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($etudiants) --}}
                            @forelse ($etudiants as $k => $etudiant)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $etudiant->etudiant->ine }}</td>
                                <td>{{ $etudiant->etudiant->prenom }}</td>
                                <td>{{ $etudiant->etudiant->nom }}</td>
                                <td>{{ $etudiant->promotion->promotion }}</td>
                                <td>{{ $etudiant->programme->programme }}</td>
                                <td>{{ $etudiant->annee_universitaire->session }}</td>
                                <td><img style="object-fit: cover;" width="40px" height="40px" src="{{ asset('storage/'.$etudiant->etudiant->photo) }}" alt=""></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10">
                                    <div class="alert alert-primary">Aucune donnée ne correspond à cette recherche !</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
@endsection
