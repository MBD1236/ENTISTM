@extends('layouts.template-scolarite')

@section('title', 'Liste des services')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

<div class="d-flex flex-row justify-content-between mt-3">
    <div class="pagetitle">
        <h1>@yield('title')</h1>
    </div>
</div>

<div class="card mt-2">
    <div class="card-body py-4 px-2">
        <div class="d-flex flex-row justify-content-end mb-2">
            <div class="mb-3">
                <a href="{{ route('scolarite.service.create') }}" class="btn-modal">
                    <i class="bi bi-plus-lg"></i>
                    <span>Ajouter un nouvelle service</span>
                </a>
            </div>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-hover table-bordered mb-0">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Matricule</th>
                        <th>Prénom et Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Service </th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $k => $service )
                    <tr>
                        <th>{{ $k+1 }}</th>
                        <td>{{ $service->matricule }}</td>
                        <td>{{ $service->nom }}</td>
                        <td>{{ $service->email }}</td>
                        <td>{{ $service->telephone }}</td>
                        <td>{{ $service->nomservice }}</td>
                        <td class="d-flex gap-1 justify-content-end align-items-center ">
                            <a href="{{ route('scolarite.service.edit', $service) }}" class="btn btn-modal p-1 px-2"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('scolarite.service.destroy', $service)}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger p-1 px-2 "><i class="bi bi-trash"></i></button>
                            </form>
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
                    {{$services->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
