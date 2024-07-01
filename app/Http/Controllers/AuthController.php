<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
  public function index()
  {
    if (Auth::check()) {
      return redirect('/task');
    }
    return view('login');
  }
  public function signup()
  {
    return view('signup');
  }

  public function register(Request $request)
  {
    $validate = $request->validate([
      'name' => 'required',
      'email' => ['required', 'email', Rule::unique('users')],
      'password' => 'required',

    ]);

    try {
      // $user = new User(); --> Usar Eloquent ORM
      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
      ]);
      return redirect('/')->with('success', 'You are registered successfully.');
    } catch (\Exception $e) {
      return redirect('/')->with('error', 'This email is already registered.');
    }
  }
  public function login(Request $request)
  {
    $validate = $request->validate([
      'email' => ['required', 'email'],
      'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      return redirect('/task')->with('success', 'You are logged in');
    }
    return redirect('/');
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/')->with('user', $request->session()->get('user'));
  }
}
