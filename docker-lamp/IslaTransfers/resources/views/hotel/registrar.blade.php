@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Registrar Nuevo Hotel</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hotel.registrar') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_zona">Zona del Hotel:</label>
            <input type="number" id="id_zona" name="id_zona" class="form-control" value="{{ old('id_zona') }}" required>
        </div>

        <div class="form-group">
            <label for="comision">Comisión (%):</label>
            <input type="number" id="comision" name="comision" class="form-control" value="{{ old('comision') }}" required>
        </div>

        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" class="form-control" value="{{ old('usuario') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Hotel</button>
    </form>
</div>
@endsection
