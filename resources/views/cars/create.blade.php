@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('cars.store') }}">
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Marca</label>
                    <input type="text" class="form-control" name="brand" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Modelo</label>
                    <input type="text" class="form-control" name="model" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Matrícula</label>
                    <input type="text" class="form-control" name="license_plate" required>
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
            <a class="btn btn-secondary" href="{{ route('cars.index') }}" role="button">Volver</a>
        </div>

    </div>
@endsection