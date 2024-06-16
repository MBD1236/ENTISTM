<div class="card">
    <div class="card-header card-head">
        <h1 class="bg-card text-center text-white card-head"><i class="bi bi-journal me-3"></i>Mes notes </h1>
    </div>

    <div class="card-body mt-4">
        <div class="row">
            <div class="col col-md-6">
                <div class="card">
                            <div class="card-head bg-card text-white"><h4 class="text-center">Licence 1 (Semestre 1 & 2)</h4></div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Matière</th>
                                        <th>Note 1</th>
                                        <th>Note 2</th>
                                        <th>Note 3</th>
                                        <th>Moyenne</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($licenceOne as $k => $l1 )
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $l1->matiere->matiere }}</td>
                                        <td>{{ $l1->note1 }}</td>
                                        <td>{{ $l1->note2 }}</td>
                                        <td>{{ $l1->note3 }}</td>
                                        <td>{{ $l1->moyenne_generale }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">Aucune note pour cette licence</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                </div>
            </div>
            <div class="col col-md-6">
                <div class="card">
                            <div class="card-head bg-card text-white"><h4 class="text-center">Licence 2 (Semestre 3 & 4)</h4></div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Matière</th>
                                        <th>Note 1</th>
                                        <th>Note 2</th>
                                        <th>Note 3</th>
                                        <th>Moyenne</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($licenceTwo as $k => $l2 )
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $l1->matiere->matiere }}</td>
                                        <td>{{ $l2->note1 }}</td>
                                        <td>{{ $l2->note2 }}</td>
                                        <td>{{ $l2->note3 }}</td>
                                        <td>{{ $l2->moyenne_generale }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Aucune note pour cette licence</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-6">
                <div class="card">
                    <div class="card-head bg-card text-white"><h4 class="text-center">Licence 3 (Semestre 5 & 6)</h4></div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Matière</th>
                                <th>Note 1</th>
                                <th>Note 2</th>
                                <th>Note 3</th>
                                <th>Moyenne</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($licenceThree as $k => $l3 )
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $l3->matiere->matiere }}</td>
                                <td>{{ $l3->note1 }}</td>
                                <td>{{ $l3->note2 }}</td>
                                <td>{{ $l3->note3 }}</td>
                                <td>{{ $l3->moyenne_generale }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">Aucune note pour cette licence</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col col-md-6">
                <div class="card">
                    <div class="card-head bg-card text-white"><h4 class="text-center">Licence 4 (Semestre 7 & 8)</h4></div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Matière</th>
                                <th>Note 1</th>
                                <th>Note 2</th>
                                <th>Note 3</th>
                                <th>Moyenne</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($licenceFour as $k => $l4 )
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $l4->matiere->matiere }}</td>
                                <td>{{ $l4->note1 }}</td>
                                <td>{{ $l4->note2 }}</td>
                                <td>{{ $l4->note3 }}</td>
                                <td>{{ $l4->moyenne_generale }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Aucune note pour cette licence</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>