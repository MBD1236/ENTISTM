@extends('layouts.template-scolarite')
@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-users me-1"></i>Etudiants inscrits</h1>
        </div>
        <div class="card">
            <div class="card-body"
                <div class="row">
                    <div class="row">
                        <div class="col-md-3"><h4 class="label-text"><i class="fa fa-filter me-1"></i>Filtrer la liste</h4></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <a href="{{ route('scolarite.orientation') }}" class="btn-modal"><i class="fa fa-refresh me-1"></i>Actualiser</a>   
                            <a href="" class="btn-modal"><i class="fa fa-print me-1"></i>Imprimer</a>
                        </div>
                    </div>
                    <div class="row mt-2">
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
                            <select class="form-select border-input">
                                <option value="">Par promotion</option>
                                    <option value=""></option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control border-input" type="search" name="filtrerselonuncritere" id="filtrerselonuncritere" placeholder="Selon un critère">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>INE</th>
                                    <th>Nom</th>
                                    <th>Prénoms</th>
                                    <th>Programme</th>
                                    <th>Niveau</th>
                                    <th>Promotion</th>
                                    <th>Session</th>
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
