<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class RegisterUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

 
    public function register()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password.confirmed' => 'La confirmación de contraseña no coincide.',
        ]);
        
        User::create($validatedData);
        //autenticar un usuario
        auth()->attempt([
            'email' => $this->email,
            'password' => $this->password 
        ]);
        return redirect()->route('inicio');
    }
    public function render()
    {
        return view('livewire.register-user');
    }
}
