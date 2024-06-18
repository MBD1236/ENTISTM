<div>

    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-users me-1"></i>La liste des utilisateurs</h1>
    </div>
    <div class="card">
        <div class="card-header">
                    <div class="mt-2">
                        @if(session()->has('successDelete'))
                            <div class="alert alert-success">
                                {{ session('successDelete') }}
                            </div>
                        @endif
                    </div>
                    <div class="mt-2">
                        @if(session()->has('errorDelete'))
                            <div class="alert alert-danger">
                                {{ session('errorDelete') }}
                            </div>
                        @endif
                    </div>

                    <div class="text-end">
                        
                        <div class="">
                            <a type="button" class="btn-modal" data-bs-toggle="modal" data-bs-target="#ajoutUsers">
                                Ajouter un utilisateur
                            </a>
                        </div>
                    </div>

                {{-- Modal pour l'ajout d'un role --}}
                <div class="modal fade" id="ajoutUsers" tabindex="-1" wire:ignore.self>
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header bg-card-modal">
                                <h3 class="modal-title">Enrégistrer un utilisateur</h3>
                                <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                            </div>
                            <div class="modal-body">
                                <form action="" enctype="multipart/form-data">
                                    <div class="mt-2">
                                        @if(session()->has('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 my-1">
                                            <label for="type" class="label-control label-text my-1">Nom<span class="text-danger">*</span></label>
                                            <input type="text" id="name"  class="form-control border-input @error('name') is-invalid @enderror" placeholder="Nom du user" wire:model='name' wire:click='resetError'>
                                            <div class="invalid-feedback">@error('name') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="col-md-12 my-1">
                                            <label for="type" class="label-control label-text my-1">Matricule<span class="text-danger">*</span></label>
                                            <input type="text" id="matricule"  class="form-control border-input @error('matricule') is-invalid @enderror" placeholder="Matricule du user" wire:model='matricule' wire:click='resetError'>
                                            <div class="invalid-feedback">@error('matricule') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="col-md-12 my-1">
                                            <label for="type" class="label-control label-text my-1">Email<span class="text-danger">*</span></label>
                                            <input type="email" id="email"  class="form-control border-input @error('email') is-invalid @enderror" placeholder="Email du user" wire:model='email' wire:click='resetError'>
                                            <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="col-md-12 my-1">
                                            <label for="role_id" class="select-control label-text my-1">Role<span class="text-danger">*</span></label>
                                            <select class="form-select border-input @error('role_id') is-invalid @enderror" wire:model="role_id" id="role_id" wire:click='resetError'>
                                                <option value="0">Sélectioner un role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" wire:key="{{ $role->id }}">{{ $role->role }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('role_id') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="col-md-12 my-1">
                                            <label for="service_id" class="select-control label-text my-1">Nom du service d'appartenance<span class="text-danger">*</span></label>
                                            <select class="form-select border-input @error('service_id') is-invalid @enderror" wire:model="service_id" id="service_id" wire:click='resetError'>
                                                <option value="0">Sélectioner un service</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}" wire:key="{{ $service->id }}">{{ $service->nomservice }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('service_id') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="col-md-12 my-1">
                                            <label for="type" class="label-control label-text my-1">Password<span class="text-danger">*</span></label>
                                            <input type="password" id="password"  class="form-control border-input @error('password') is-invalid @enderror" placeholder="Mot de passe du user" wire:model='password' wire:click='resetError'>
                                            <div class="invalid-feedback">@error('password') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="modal-footer my-1">
                                            <button type="submit" wire:click.prevent='store' class="btn-modal"><i class="fa fa-check me-1"></i>Enregistrer</button>
                                            <button type="button" class="btn-fermer bg-danger text-white" data-bs-dismiss="modal"><i class="fa fa-times me-1"></i>Fermer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal pour la modification d'un cours --}}
                <div class="modal fade" id="modifUsers" tabindex="-1" wire:ignore.self>
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header bg-card-modal">
                                <h3 class="modal-title">Modification d'un utilisateur</h3>
                                <button type="button" class="bg-btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                            </div>
                            <div class="modal-body">
                                <form action="" enctype="multipart/form-data">
                                    <div class="mt-2">
                                        @if(session()->has('successUpdate'))
                                            <div class="alert alert-success">
                                                {{ session('successUpdate') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 my-1">
                                            <label for="type" class="label-control label-text mt-1">Nom<span class="text-danger">*</span></label>
                                            <input type="text" id="name"  class="form-control border-input @error('name') is-invalid @enderror" placeholder="Nom du user" wire:model='name' wire:click='resetError'>
                                            <div class="invalid-feedback">@error('name') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="col-md-12 my-1">
                                            <label for="type" class="label-control label-text mt-1">Matricule<span class="text-danger">*</span></label>
                                            <input type="text" id="matricule"  class="form-control border-input @error('matricule') is-invalid @enderror" placeholder="Matricule du user" wire:model='matricule' wire:click='resetError'>
                                            <div class="invalid-feedback">@error('matricule') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="col-md-12 my-1">
                                            <label for="type" class="label-control label-text mt-1">Email<span class="text-danger">*</span></label>
                                            <input type="email" id="email"  class="form-control border-input @error('email') is-invalid @enderror" placeholder="Email du user" wire:model='email' wire:click='resetError'>
                                            <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="col-md-12 my-1">
                                            <label for="role_id" class="select-control label-text mt-1">Role<span class="text-danger">*</span></label>
                                            <select class="form-select border-input @error('role_id') is-invalid @enderror" wire:model="role_id" id="role_id" wire:click='resetError'>
                                                <option value="0">Sélectioner un role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" wire:key="{{ $role->id }}">{{ $role->role }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('role_id') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="col-md-12 my-1">
                                            <label for="service_id" class="select-control label-text my-1">Nom du service d'appartenance<span class="text-danger">*</span></label>
                                            <select class="form-select border-input @error('service_id') is-invalid @enderror" wire:model="service_id" id="service_id" wire:click='resetError'>
                                                <option value="0">Sélectioner un service</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}" wire:key="{{ $service->id }}">{{ $service->nomservice }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('service_id') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="col-md-12 my-1">
                                            <label for="type" class="label-control label-text mt-1">Password<span class="text-danger">*</span></label>
                                            <input type="password" id="password"  class="form-control border-input @error('password') is-invalid @enderror" placeholder="Mot de passe du user" wire:model='password' wire:click='resetError'>
                                            <div class="invalid-feedback">@error('password') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" wire:click.prevent='update' class="btn-modal"><i class="fa fa-check me-1"></i>Enregistrer</button>
                                            <button type="button" class="btn-fermer bg-danger text-white" data-bs-dismiss="modal"><i class="fa fa-times me-1"></i>Fermer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <div class="card-body">
            <div class="row table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Matricule</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $users as $k => $u)
                        <tr>
                            <th>{{ $k+1 }}</th>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->matricule }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->role->role }}</td>
                            <td class="">
                                <a type="button" title="Modifier" class="fs-5 me-1" wire:click='edit({{ $u }})' data-bs-toggle="modal" data-bs-target="#modifUsers"><i class="fa fa-edit btn-color-primary"></i></a>                               
                                <a class="me-1" href="" title="Supprimer" wire:click='delete({{ $u }})' wire:confirm="Est ce que vous voulez supprimé cet utilisateur ?"><i class="fs-5 fa fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">
                                <div class="alert alert-primary">Aucune donnée ne correspond à cette recherche !</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="card-footer mt-1">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <ul class="pagination-rounded">
                        {{$users->links('vendor.livewire.bootstrap')}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

