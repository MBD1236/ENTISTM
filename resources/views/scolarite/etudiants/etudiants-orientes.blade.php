@extends('layouts.template-scolarite')
@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-users me-1"></i>Etudiants orientés</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="" method="">
                        <div class="row">
                            <h4 class="label-text"><i class="fa fa-file me-1"></i>Importer la liste des étudiants</h4>
                            <div class="col-md-4">
                                <input class="form-control border-input mt-1" type="file" name="televerser" id="televerser">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn-modal"><i class="fa fa-upload me-1"></i>Téléverser</button>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </form>
                    <div class="row">
                        <h4 class="label-text"><i class="fa fa-filter me-1"></i>Filtrer la liste</h4>
                        <div class="col-md-3">
                            <select class="form-select border-input">
                                <option value="">Selon la session</option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select border-input">
                                <option value="">Par programme</option>
                                    <option value=""></option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control border-input" type="search" name="filtrerselonuncritere" id="filtrerselonuncritere" placeholder="Selon un critère">
                        </div>
                        <div class="col-md-3 mt-2">
                            <a href="{{ route('scolarite.orientation') }}" class="btn-modal"><i class="fa fa-refresh me-1"></i>Actualiser</a>
                            <a href="" class="btn-modal"><i class="fa fa-print me-1"></i>Imprimer</a>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>INE</th>
                                    <th>Prénoms</th>
                                    <th>Nom</th>
                                    <th>Profil</th>
                                    <th>Session</th>
                                    <th>Ecole d'origine</th>
                                    <th>Centre d'examen</th>
                                    <th>Programme</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                </tr>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
