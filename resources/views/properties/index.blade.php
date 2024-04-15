@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @include('includes.messages')
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Activo</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Garaje</th>
                        <th scope="col">Color</th>
                        <th scope="col">Propietario</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                        <tr>
                            <td>
                                @if ($property->active)
                                    ✅
                                @else
                                    ❌
                                @endif
                            </td>
                            <td>{{$property->type}}</td>
                            <td>
                                @if ($property->has_garage)
                                    ✅
                                @else
                                    ❌
                                @endif
                            </td>
                            <td>{{ $property->color }}</td>
                            <td>{{ $property->owner }}</td>
                            <td>
                                <form action="{{ route('properties.destroy', $property->id) }}" method="POST" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('properties.show', $property->id) }}" class="btn btn-outline-primary">👁️</a>
                                    <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-outline-secondary">✏️</a>
                                    <button type="submit" class="btn btn-outline-danger">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-grid gap-2">
            <a name="" id="" class="btn btn-success" href="{{ route('properties.create') }}" role="button">Añadir propiedad</a>
            <a name="" id="" class="btn btn-secondary" href="{{ route('home') }}" role="button">Volver</a>
        </div>

    </div>
@endsection