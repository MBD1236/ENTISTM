<div> 
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-users me-3"></i>Les details des informations de l'enseignant</h1>
        </div>

        <div class="card-body">
            <div class="table-responsive-sm">
                <table id="tableau" class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <tr>
                        <th>Matricule </th>
                        <td>{{ $enseignant->matricule }}</td>
                        <th>Prénom et Nom </th>
                        <td>{{ $enseignant->prenom }} {{ $enseignant->nom }}</td>
                    </tr>
                    <tr>
                        <th>Téléphone </th>
                        <td>{{ $enseignant->telephone }}</td>
                        <th>Adresse e-mail </th>
                        <td>{{ $enseignant->email }}</td>
                    </tr>
                    <tr>
                        <th>Adresse/Quartier </th>
                        <td>{{ $enseignant->adresse }}</td>
                        <th>Département </th>
                        <td>{{ $enseignant->departement->departement }}</td>
                    </tr>
                </table>
            </div>
           
            <div class="my-4 d-flex justify-content-center">
                <img width="370px" height="300px" src="{{asset('storage/enseignants/'.$enseignant->photo) }}" alt="PHOTO" align="left" style="margin:0px 10px 10px 0px">
                <img width="370px" height="300px" src="{{asset('storage/enseignants/'.$enseignant->photo) }}" alt="PHOTO" align="left" style="margin:0px 10px 10px 0px">
            </div>
        </div> <!-- end card body-->
        <div class="card-footer mt-1">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <ul class="pagination-rounded">
                        {{-- {{$enseignants->links()}} --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>