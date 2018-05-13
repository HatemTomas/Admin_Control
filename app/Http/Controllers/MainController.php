<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\AdminLoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index']);
    }

    public function index()
    {
        return view('index');
    }

    public function getLogin()
    {
        return Auth::check() ? redirect()->route('AdminIndex') : view('login');
    }

    public function Login(AdminLoginRequest $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('AdminIndex');
        }

        return redirect()->back()->with(['fail' => 'invalid credentials!']);
    }

    public function getRegisterPage()
    {
        return view('registration');
    }

    public function postRegistration(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = new User();
        $admin->name = $request['name'];
        $admin->email = $request['email'];
        $admin->password = bcrypt($request['password']);
        $admin->save();

        Auth::login($admin);

        return redirect()->route('AdminIndex');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
