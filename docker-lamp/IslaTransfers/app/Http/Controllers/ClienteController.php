<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    // Mostrar formulario de registro
    public function mostrarRegistro()
    {
        return view('cliente.registro'); // Asegúrate de crear esta vista
    }

    // Registrar un nuevo cliente
    public function registrarCliente(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido1' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'direccion' => 'required|string|max:255',
            'codigoPostal' => 'required|string|max:10',
            'ciudad' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'email' => 'required|email|unique:transfer_viajeros,email',
            'password' => 'required|string|min:6',
        ]);

        // Crear el cliente
        Cliente::create([
            'nombre' => $request->nombre,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'direccion' => $request->direccion,
            'codigoPostal' => $request->codigoPostal,
            'ciudad' => $request->ciudad,
            'pais' => $request->pais,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Aplica hashing a la contraseña
        ]);

        return redirect()->route('cliente.login')->with('success', 'Cliente registrado con éxito.');
    }

    // Mostrar formulario de login
    public function mostrarLogin()
    {
        return view('cliente.login'); // Asegúrate de crear esta vista
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        // Verificar si es el administrador
        if (
            $request->email === env('ADMIN_EMAIL') &&
            $request->password === env('ADMIN_PASSWORD')
        ) {
            Auth::loginUsingId(100); 
            session([
                'cliente_id' => 'admin',
                'tipo_cliente' => 'administrador',
                'email_cliente' => $request->email,
                'nombre_cliente' => 'Admin',
            ]);
            \Log::info('Autenticación exitosa para el administrador: ' . $request->email);
            return redirect()->route('admin.home');
        }
    
        // Verificar usuario normal usando Auth
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $cliente = Auth::user();
            \Log::info('Autenticación exitosa para el cliente: ' . $request->email);
    
            session([
                'cliente_id' => $cliente->id_viajero,
                'tipo_cliente' => 'particular',
                'email_cliente' => $cliente->email,
                'nombre_cliente' => $cliente->nombre,
            ]);
            return redirect()->route('cliente.home');
        } else {
            \Log::error('Falló autenticación para: ' . $request->email);
        }
    
        // En caso de error, regresar al login con un mensaje de error
        return back()->withErrors(['email' => 'Credenciales incorrectas.']);
    }
    


    // Mostrar panel del cliente
    public function home()
    {
        if (session('tipo_cliente') !== 'particular') {
            return redirect()->route('cliente.login');
        }

        return view('cliente.home'); // Asegúrate de crear esta vista
    }

    // Mostrar panel del administrador
    public function homeAdmin()
    {
        if (session('tipo_cliente') !== 'administrador') {
            return redirect()->route('cliente.login');
        }

        return view('admin.home'); // Asegúrate de crear esta vista
    }

    // Obtener perfil del cliente
    public function mostrarPerfil()
    {
        $cliente = Cliente::find(session('cliente_id'));

        if (!$cliente) {
            return redirect()->route('cliente.login');
        }

        return view('cliente.perfil', ['cliente' => $cliente]);
    }

    // Modificar el perfil del cliente
    public function modificarPerfil(Request $request)
    {
        $cliente = Cliente::find(session('cliente_id'));

        if (!$cliente) {
            return redirect()->route('cliente.login');
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:transfer_viajeros,email,' . $cliente->id_viajero . ',id_viajero',
            'password' => 'nullable|string|min:6',
        ]);

        $cliente->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => $request->filled('password') ? bcrypt($request->password) : $cliente->password,
        ]);

        return redirect()->route('cliente.perfil')->with('success', 'Datos actualizados con éxito.');
    }
}
