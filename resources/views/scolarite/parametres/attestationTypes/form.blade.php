@extends('layouts.template-scolarite')

@section('title', $attestationType->exists ? "Modification d'un type attestation" : "Enregistremet d'un nouvel type attestation")

@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h2 class="bg-card text-white card-head d-flex flex-row justify-content-center">
                <div> 
                    @if ($attestationType->exists)
                        <i class="fa fa-pencil-square me-2"></i>
                        <span>@yield('title')</span>
                    @else
                        <i class="fa fa-save me-2"></i>
                        <span>@yield('title')</span>
                    @endif
                </div>
            </h2>
        </div>
    
        <div class="card mt-3">
            <div class="card-body">
                <form action="{{ $attestationType->exists ? route('scolarite.attestationType.update', $attestationType) : route('scolarite.attestationType.store')}}" method="post" class="vstack gap-2" enctype="multipart/form-data">
                    @method($attestationType->id ? "put" : "post")
                    @csrf
                    <div class="col-11 d-flex flex-row m-auto gap-2">
                        <div class="col-9 form-floating mt-2">
                            <div class="form-floating">
                                <input class="form-control border-input @error('type') is-invalid  @enderror" type="text" name="type" id="floatingtype" placeholder="type" value="{{old('type', $attestationType->type)}}">
                                <label for="floatingtype" class="label-control label-text">Type d'attestation</label>  
                                <div class="invalid-feedback">@error('type') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-2 ">
                            <button type="submit" class="btn-modal">
                                @if ($attestationType->id) 
                                    <i class="fa fa-pencil-square me-1"></i>
                                    Modifier un type
                                @else 
                                    <i class="fa fa-plus me-1"></i>
                                    Ajouter un type   
                                @endif
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
