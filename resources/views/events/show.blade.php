@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <div class="d-grid gap-2 mt-3">
            <p><b>Nombre: </b>{{ $event->name }}</p>
            <p><b>Descripción: </b>{{ $event->description }}</p>
            <p><b>Asistentes: </b>{{ $event->assistants }}</p>
            <p><b>Límite de Asistentes: </b>{{ $event->assistants_limit }}</p>
            <p><b>Patrocinado: </b>{{ $event->sponsored ? 'Sí' : 'No' }}</p>
            <p><b>Fecha: </b>{{ $event->date }}</p>
            <a class="btn btn-secondary" href="{{ route('events.index') }}" role="button">Volver</a>
        </div>
    </div>
@endsection
