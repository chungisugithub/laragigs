<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show Register/Create User Form
    public function create() {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:5']
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        
    }
}
