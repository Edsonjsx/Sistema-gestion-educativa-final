<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User; // Cambia Administrador por User

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validar los campos
        $request->validate([
            'name' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'dni' => 'required|string|max:20|unique:administrador',
            'email' => 'required|email|max:150|unique:administrador,correo',
            'username' => 'required|string|max:50|unique:administrador',
            'password' => 'required|string|min:6|confirmed',
        ]);

        try {
            // Guardar nuevo administrador usando el modelo User
            $user = User::create([
                'nombre' => $request->name,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'dni' => $request->dni,
                'correo' => $request->email,
                'username' => $request->username,
                //'password' => Hash::make($request->password), // encriptar password
                'password' => $request->password,  
            ]);

            // Verificar si se ha creado correctamente el usuario
            // Descomenta esta línea si deseas depurar
            // dd($user); // Esto te permite ver si el usuario se ha creado correctamente.

            // Mensaje de éxito
            Session::flash('success', 'Registro exitoso. Ahora puedes iniciar sesión.');

            // Redirigir al welcome.blade.php
            return redirect()->route('welcome');  // Redirige al welcome.blade.php

        } catch (\Exception $e) {
            // Si ocurre algún error, mostrar un mensaje
            Session::flash('error', 'Hubo un error al guardar los datos. Inténtalo nuevamente.');
            return redirect()->back();
        }
    }
}
