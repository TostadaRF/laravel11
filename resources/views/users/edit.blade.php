@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('users.update', $user->id ) }}">
            @method('PUT')
            @csrf
            @include('includes.messages')
            <div class="row justify-content-center">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="surname" value="{{ $user->surname }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">DNI</label>
                    <input type="text" class="form-control" name="dni" value="{{ $user->dni }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Reintroducir contraseña</label>
                    <input type="password" class="form-control" name="pass" value="">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Comprobar contraseña</label>
                    <input type="password" class="form-control" name="pass_check" value="">
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success" role="button">Enviar</button>
            </div>
        </form>

        <div class="d-grid gap-2 mt-3">
            <a class="btn btn-secondary" href="{{ route('users.index') }}" role="button">Volver</a>
        </div>

    </div>
@endsection