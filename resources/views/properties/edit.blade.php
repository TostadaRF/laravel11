@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('properties.update', $property->id) }}">
            @method('PUT')
            @csrf
            @include('includes.messages')session()->flash('success', 'Usuario creado correctamente.');
            <div class="row justify-content-center">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Tipo</label>
                    <select class="form-select" name="type" required>
                        <option value="">Selecciona un tipo</option>
                        <option value="Terrera" {{ $property->type == "Terrera" ? 'selected' : '' }}>Terrera</option>
                        <option value="Piso" {{ $property->type == "Piso" ? 'selected' : '' }}>Piso</option>
                        <option value="Duplex" {{ $property->type == "Duplex" ? 'selected' : '' }}>Duplex</option>
                        <option value="Mansión" {{ $property->type == "Mansión" ? 'selected' : '' }}>Mansión</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Garaje</label>
                    <div class="mt-2">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" value="1" name="has_garage" id="garage_yes" {{ $property->has_garage == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="garage_yes">
                                Sí
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" value="0" name="has_garage" id="garage_no" {{ $property->has_garage == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="garage_no">
                                No
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Color</label>
                    <select class="form-select" name="color" required>
                        <option value="">Selecciona un color</option>
                        <option value="Rojo" {{ $property->color == "Rojo" ? 'selected' : '' }}>Rojo</option>
                        <option value="Verde" {{ $property->color == "Verde" ? 'selected' : '' }}>Verde</option>
                        <option value="Azul" {{ $property->color == "Azul" ? 'selected' : '' }}>Azul</option>
                        <option value="Blanco" {{ $property->color == "Blanco" ? 'selected' : '' }}>Blanco</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Propietario</label>
                    <select class="form-select" name="owner" required>
                        <option value="{{ $property->owner }}">{{ $property->owner }}</option>
                        @foreach ($users as $user)
                            @if ($user->name != $property->owner)
                                <option value="{{ $user->name }}">{{ $user->id }} - {{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success" role="button">Enviar</button>
            </div>
        </form>

        <div class="d-grid gap-2 mt-3">
            <a class="btn btn-secondary" href="{{ route('properties.index') }}" role="button">Volver</a>
        </div>

    </div>
@endsection