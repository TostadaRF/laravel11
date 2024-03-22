@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Activo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Matrícula</th>
                        <th scope="col">Propietario</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                        <tr>
                            <td>
                                @if ($car->active)
                                    ✅
                                @else
                                    ❌
                                @endif
                            </td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->license_plate }}</td>
                            <td>{{ $car->owner }}</td>
                            <td>
                                <form action="{{ route('cars.destroy', $car->id) }}" method="POST" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('cars.show', $car->id) }}" class="btn btn-outline-primary">👁️</a>
                                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-outline-secondary">✏️</a>
                                    <button type="submit" class="btn btn-outline-danger">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-grid gap-2">
            <a name="" id="" class="btn btn-success" href="{{ route('cars.create') }}" role="button">Añadir coche</a>
            <a name="" id="" class="btn btn-secondary" href="{{ route('home') }}" role="button">Volver</a>
        </div>

    </div>
@endsection