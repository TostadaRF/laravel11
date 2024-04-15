@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            @include('includes.messages')
            <div class="row justify-content-center">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="surname" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">DNI</label>
                    <input type="text" class="form-control" name="dni" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="pass"  required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Comprobar contraseña</label>
                    <input type="password" class="form-control" name="pass_check" required>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success" role="button">Enviar</button>
            </div>
        </form>

        <div class="d-grid gap-2 mt-3">
            @auth
            <a class="btn btn-secondary" href="{{ route('users.index') }}" role="button">Volver</a>
            @endauth
            @guest
            <a class="btn btn-secondary" href="{{ route('home') }}" role="button">Volver</a>
            @endguest
        </div>

    </div>
@endsection