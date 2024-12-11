@extends('layouts.layout')

@section('title', 'Isla Transfers - Bienvenido')

@section('styles')
<style>
    .options {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }

    .options h2 {
        font-size: 1.8em;
        color: #007bff;
        margin-top: 2em;
        margin-bottom: 1em;
        position: relative;
        padding-bottom: 0.5em;
    }

    .options h2 i {
        margin-right: 0.5em;
    }

    .options a {
        display: block;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        padding: 1em;
        border-radius: 8px;
        transition: background-color 0.3s, transform 0.2s;
        margin-bottom: 1.5em;
    }

    .options a i {
        margin-right: 0.5em;
    }

    .options a:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .options h2::after {
        content: '';
        display: block;
        width: 100px;
        height: 3px;
        background-color: #007bff;
        margin: 0.5em auto 0;
        border-radius: 5px;
    }
</style>
@endsection

@section('content')
    <div class="options">
        <h2><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</h2>
        <a href="{{ url('/cliente/login') }}"><i class="fas fa-user"></i> Iniciar sesión como Cliente o Administrador</a>
        <a href="{{ url('/hotel/login') }}"><i class="fas fa-hotel"></i> Iniciar como Cliente Corporativo (Hotel)</a>

        <h2><i class="fas fa-user-plus"></i> Registro</h2>
        <a href="{{ url('/cliente/registrar') }}"><i class="fas fa-user"></i> Registrar como Cliente Particular</a>
    </div>
@endsection
