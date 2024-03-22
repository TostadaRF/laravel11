@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <div class="d-grid gap-2 mt-3">
            <p><b>Nombre: </b>{{ $user->name }}</p>
            <p><b>Apellidos: </b>{{ $user->surname }}</p>
            <p><b>DNI: </b>{{ $user->dni }}</p>
            <p><b>Email: </b>{{ $user->email }}</p>
            <a class="btn btn-secondary" href="{{ route('users.index') }}" role="button">Volver</a>
        </div>
    </div>
@endsection