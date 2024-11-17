@extends('layouts.app')

@section('title', 'Isla Transfers - Bienvenido')

@section('content')
    <div class="options">
        <h2><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</h2>
        <a href="{{ url('/cliente/login') }}"><i class="fas fa-user"></i> Iniciar sesión como Cliente o Administrador</a>

        <h2><i class="fas fa-user-plus"></i> Registro</h2>
        <a href="{{ url('/cliente/registrar') }}"><i class="fas fa-user"></i> Registrar como Cliente Particular</a>
        <a href="{{ url('/hotel/registrar') }}"><i class="fas fa-hotel"></i> Registrar como Cliente Corporativo (Hotel)</a>
    </div>
@endsection
