<div> 
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head"><i class="fa fa-users me-3"></i>Les details des informations du département</h1>
        </div>

        <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
                <h3 class="my-2 fw-bold">Département {{ $information->departement }} </h3>
                <p class="my-2 fw-bold">Code : {{ $information->code }}</p>
            </div>
            <div class="row fw-bold">
                <div class="col-4 text-start">
                    <span>Téléphone: {{ $information->telephone }}</span>
                </div>
                <div class="col-4 text-center">
                    <span>Email: {{ $information->email }}</span>
                </div>
                <div class="col-4 text-end">
                    <span>Adresse: {{ $information->adresse }}</span>
                </div>
            </div>
            
            <div class="my-4">
                <img width="370px" height="300px" src="{{asset('storage/informations/'.$information->photo) }}" alt="PHOTO" align="left" style="margin:0px 10px 10px 0px">
                <p>{{$information->description}} </p>
            </div>
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