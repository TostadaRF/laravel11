@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <div class="d-grid gap-2 mt-3">
            <p><b>Tipo: </b>{{ $property->type }}</p>
            <p><b>Garaje: </b> @if($property->has_garage)✅ @else ❌ @endif</p>
            <p><b>Color: </b>{{ $property->color }}</p>
            <p><b>Propietario: </b>{{ $property->owner }}</p>
            <a class="btn btn-secondary" href="{{ route('properties.index') }}" role="button">Volver</a>
        </div>
    </div>
@endsection