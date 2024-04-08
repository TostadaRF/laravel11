@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <h1 class="text-center mb-5">🏠 Bienvenido a la aplicación de alquileres</h1>
        <div class="card mb-5">
            <div class="card-body">
                <h4 class="card-title">🧍 Usuarios</h4>
                <p class="card-text">
                    <a name="" id="" class="btn btn-primary" href="{{ route('users.index') }}" role="button">Ir a usuarios</a>
                    <a name="" id="" class="btn btn-primary" href="{{ route('login') }}" role="button">Iniciar sersión</a>
                </p>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <h4 class="card-title">🚗 Coches</h4>
                <p class="card-text">
                    <a name="" id="" class="btn btn-primary" href="{{ route('cars.index') }}" role="button">Ir a coches</a>
                </p>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <h4 class="card-title">🏠 Inmuebles</h4>
                <p class="card-text">
                    <a name="" id="" class="btn btn-primary" href="{{ route('properties.index') }}" role="button">Ir a Inmuebles</a>
                </p>
            </div>
        </div>
    </div>
@endsection