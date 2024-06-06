@extends('thd-layouts.my')

@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h4 class="bg-card text-center text-white card-head">
                Liste des étudiants inscrits en "{{ $programme->programme }}" 
                session "{{ $annee_universitaire->session }}"
                @if($promotion) 
                    promotion "{{ $promotion->promotion }}"
                @endif
            </h4>
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
                            @forelse ($etudiants as $k => $etudiant)
                            <tr>
                                <th>{{ $k+1 }}</th>
                                <th>{{ $etudiant->etudiant->ine }}</th>
                                <td>{{ $etudiant->etudiant->prenom }}</td>
                                <td>{{ $etudiant->etudiant->nom }}</td>
                                <td>{{ $etudiant->promotion->promotion }}</td>
                                <td>{{ $etudiant->programme->programme }}</td>
                                <td>{{ $etudiant->annee_universitaire->session }}</td>
                                <td><img width="50px" src="{{ asset('storage/'.$etudiant->etudiant->photo) }}" alt=""></td>
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
