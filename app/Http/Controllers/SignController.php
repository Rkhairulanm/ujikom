<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SignController extends Controller
{
    public function signin()
    {
        return view('layouts.sign-in');
    }
    public function signup()
    {
        $user = User::with('role')->get();
        $role = Role::get();
        return view('layouts.sign-up', compact('user', 'role'));
    }
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role;
        $user->save();

        if ($user) {
            Session::flash('status', 'success');
            Session::flash('message', 'Registration successful');
        }

        return redirect('/sign-up');
    }
    // Controller untuk login
    public function login(Request $request)
    {
        // $credentials = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'Login Failed');
            return back();
        }
    }
        public function index(Request $request)
    {
        $keyword = $request->keyword;
        $user = User::where('name', 'LIKE', '%' . $keyword . '%')
            ->with('role')
            ->get();
        $title = 'Kelola User';
        return view('layouts.kelola-user', compact('title', 'user'));
    }
    public function sistem($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'user Deleted Successfully');

        return redirect('/kelola-user');
    }
}
