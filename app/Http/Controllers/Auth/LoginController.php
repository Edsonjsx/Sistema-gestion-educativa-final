<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // No es necesario importar Hash
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
        /**
         * Handle a login request to the application.
         */
        public function login(Request $request)
        {
        // Verificar si el usuario ya está autenticado
        if (session('is_logged_in')) {
            return redirect()->route('home.index'); // Redirige al inicio si ya está autenticado
        }

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Buscar el administrador por nombre de usuario
        $admin = DB::table('administrador')
                ->where('username', $request->username)
                ->first();

        // Verificar si existe el administrador y la contraseña coincide (sin hash)
        if ($admin && $admin->password === $request->password) {
            // Crear una sesión para el administrador
            session([
                'admin_id' => $admin->id_admin,
                'admin_name' => $admin->nombre,
                'admin_username' => $admin->username,
                'is_logged_in' => true
            ]);

            return redirect()->route('home.index');
        }

        // Autenticación fallida
        throw ValidationException::withMessages([
            'username' => ['Las credenciales ingresadas no coinciden con nuestros registros.'],
        ]);
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        // Eliminar todas las variables de sesión
        $request->session()->flush();
    
        // Invalidate the session and regenerate the token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // Redirigir a la página de inicio (login)
        return redirect('/');
    }
    
    


    /**
     * Check if user is logged in
     */
    public static function checkAuth()
    {
        return session('is_logged_in', false);
    }
}
