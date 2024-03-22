@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('properties.store') }}">
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Tipo</label>
                    <select class="form-select" name="type" required>
                        <option value="">Selecciona un tipo</option>
                        <option value="Terrera">Terrera</option>
                        <option value="Piso">Piso</option>
                        <option value="Duplex">Duplex</option>
                        <option value="Mansión">Mansión</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Garaje</label>
                    <div class="mt-2">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" value="1" name="has_garage" id="garage_yes">
                            <label class="form-check-label" for="garage_yes">
                                Sí
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" value="0" name="has_garage" id="garage_no" checked>
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
                        <option value="Rojo">Rojo</option>
                        <option value="Verde">Verde</option>
                        <option value="Azul">Azul</option>
                        <option value="Blanco">Blanco</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Propietario</label>
                    <select class="form-select" name="owner" required>
                        <option value="">Selecciona un propietario</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->name }}">{{ $user->id }} - {{ $user->name }}</option>
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