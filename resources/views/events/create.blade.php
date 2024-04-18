@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('events.store') }}">
            @csrf
            @include('includes.messages')
            <div class="row justify-content-center">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="description" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Límite de Asistentes</label>
                    <input type="number" class="form-control" name="assistants_limit" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Patrocinado</label>
                    <select class="form-select" name="sponsored" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Fecha</label>
                    <input type="datetime-local" class="form-control" name="date" required>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success" role="button">Enviar</button>
            </div>
        </form>

        <div class="d-grid gap-2 mt-3">
            <a class="btn btn-secondary" href="{{ route('events.index') }}" role="button">Volver</a>
        </div>

    </div>
@endsection
