<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Requests\PageRequest;
use Illuminate\Support\Str;
use App\Laravel\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Laravel\Requests\Backoffice\AdminAccountRequest;

class AuthenticationController extends Controller
{
    public function __construct() {}

    public function login(PageRequest $request)
    {
        $this->data['page_title'] = "Login Page";
        return view('backoffice.auth.login', $this->data);
    }

    public function logout(PageRequest $request)
    {
        Auth('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        session()->flash('notification-status', "success");
        session()->flash('notification-msg', "You have been signed out.");
        return redirect()->route('backoffice.auth.login');
    }

    public function authenticate(PageRequest $request)
    {
        $credentials = [
            'email' => strtolower($request->input('email')),
            'password' => $request->input('password'),
        ];

        if (Auth('admin')->attempt($credentials)) {
            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Successfully logged in. Welcome back!");
            return redirect()->route('backoffice.dashboard');
        }

        session()->flash('notification-status', "failed");
        session()->flash('notification-msg', "Invalid credentials. Please try again.");
        return redirect()->back()->withInput($request->only('email'));
    }

    public function register(PageRequest $request)
    {
        $this->data['page_title'] = "Register Page";
        return view('backoffice.auth.register', $this->data);
    }

    public function store(AdminAccountRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = new Admin();
            $user->name = strtoupper($request->input('name'));
            $user->email = strtolower($request->input('email'));
            $user->password = bcrypt($request->input('password'));
            $user->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Successfully registered. Please login to continue.");
            return redirect()->route('backoffice.auth.login');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }
}
