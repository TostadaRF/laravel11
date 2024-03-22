@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <div class="d-grid gap-2 mt-3">
            <p><b>Marca: </b>{{ $car->brand }}</p>
            <p><b>Modelo: </b>{{ $car->model }}</p>
            <p><b>Matrícula: </b>{{ $car->license_plate }}</p>
            <p><b>Propietario: </b>{{ $car->owner }}</p>
            <a class="btn btn-secondary" href="{{ route('cars.index') }}" role="button">Volver</a>
        </div>
    </div>
@endsection