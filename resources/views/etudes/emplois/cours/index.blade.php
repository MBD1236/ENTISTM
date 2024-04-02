@extends('layouts.template-etudes')
@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-calendar me-1"></i>Emplois du temps de cours</h1>
        </div>
        <div class="card">
            <div class="card-body">
              <!-- Début de notre Switch -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="importer" aria-selected="true"><span class="switch-text"><i class="fa fa-upload me-1"></i>Importer</span></button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="filtrer" aria-selected="false"><span class="switch-text"><i class="fa fa-filter me-1"></i>Filtrer</span></button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><span class="switch-text"><i class="fa fa-print me-1"></i>Imprimer</span></button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="" method="">
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <input class="form-control border-input mt-1" type="file" name="televerser" id="televerser">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn-modal"><i class="fa fa-upload me-1"></i>Téléverser</button>
                            </div>
                            <div class="col-md-6"></div>
                        </div> 
                    </form>
                    <div class="row mt-4">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Jour</th>
                                    <th>Horaire</th>
                                    <th>Matière</th>
                                    <th>Professeur</th>
                                    <th>Salle</th>
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
                <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">

                </div>
                <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
                    
                </div>
              </div><!-- Fin de notre Switch -->
            </div>
        </div>
    </div>
@endsection
