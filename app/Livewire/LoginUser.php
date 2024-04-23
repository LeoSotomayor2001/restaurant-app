<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginUser extends Component
{ 
    public $name;
    public $email;
    public $password;

    public function redirectRegister()
    {
        return redirect()->route('register');
    }


    public function login()
    {
        $this->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Autenticación exitosa, redireccionar a la página principal o a donde sea necesario
            return redirect()->route('admin');
        } else {
            // Autenticación fallida, mostrar mensaje de error
            session()->flash('error', 'Credenciales incorrectas. Por favor, intenta de nuevo.');
        }

       

        
    }
    public function render()
    {
        return view('livewire.login-user');
    }
}
