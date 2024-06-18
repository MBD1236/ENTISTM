<div>
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="fa fa-file me-2"></i>La liste des fichiers reçus</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="mt-2">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-4 col-sm 12 mt-2 p-1">
                    <h4 class="label-text"><i class="fa fa-filter me-1"></i>Filtrer la liste par nom de service </h4>
                </div>
                <div class="col-md-4 col-sm-12 mt-2 p-1">
                    <div class="form-group">
                        <select wire:model.live="service_id" name="service_id" id="service_id" class="form-select border-input @error('service_id') is-invalid @enderror" type="search" style="height: 40px;">
                            <option value="0">Selectionner un nom de service </option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}" wire:key="{{ $service->id }}">{{ $service->nomservice }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('service_id') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- pour la table --}}
        <div class="card-body">
            <div class="row table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom du service</th>
                            <th>Document partagé</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($partages as $k => $partage)
                        <tr>
                            <td>{{ $k + 1 }}</td>
                            <td>{{ $partage->service->nomservice }}</td>
                            <td>{{ $partage->fichier }}</td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Aucun fichier partagé pour le moment.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer mt-1">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <ul class="pagination-rounded">
                        {{$partages->links('vendor.livewire.bootstrap')}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
