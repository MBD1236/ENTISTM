<div> 
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-users me-3"></i>Les details des informations du département</h1>
        </div>
        <div class="d-flex flex-row justify-content-end px-2">
            <a href="{{ route('genieinfo.information.create')}}" class="btn-modal">
                <i class="fa fa-plus me-1"></i>
                <span>Enregistrer la description du département</span>
            </a>
        </div>
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive-sm">
                <table id="tableau" class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Département</th>
                            <th>Code </th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            {{-- <th>Adresse</th> --}}
                            {{-- <th>Description</th> --}}
                            <th>Photo</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($informations as $k => $information)
                            <tr wire:key="{{ $information->id }}">
                                <td>{{ $k+1 }}</td>
                                <td>{{ $information->departement}}</td>
                                <td>{{ $information->code}}</td>
                                <td>{{ $information->telephone}}</td>
                                <td>{{ $information->email}}</td>
                                {{-- <td>{{ $information->adresse}}</td> --}}
                                {{-- <td>{{substr( $information->description, 0,10)}}...</td> --}}
                                <td><img width="40px" height="30px" src="{{asset('storage/'.$information->photo) }}" alt="PHOTO"></td>
                                <td class="p-1 d-flex gap-1 justify-content-end gap-2">
                                    <a href="{{ route('genieinfo.information.show', $information) }}" ><i class="bi bi-eye-fill cprimary"></i></a>
                                    <a href="{{ route('genieinfo.information.edit', $information) }}" ><i class="bi bi-pencil-square cprimary"></i></a>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div> <!-- end table-responsive-->

        </div> <!-- end card body-->
        <div class="card-footer mt-1">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <ul class="pagination-rounded">
                        {{-- {{$informations->links()}} --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>