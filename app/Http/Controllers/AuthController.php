<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function index()
    {
        $plans = Plan::where('status', 1)->get();

        return view('auth.index', compact('plans'));
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->with('roles')->first();

        if (!$user) {
            return back()->with(['error' => 'Error']);
        }

        if (!Hash::check($password, $user->password)) {
            return back()->with(['error' => 'Error']);
        }

        $approvedRoles = Role::select('name')->get()->pluck('name')->toArray();

        if (!$user->hasRole($approvedRoles)) {
            return back()->with(['error' => 'Error']);
        }

        auth()->login($user);

        return redirect()->route('home')->with(['success' => 'Success']);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->assignRole('guest');

        $user->plan()->create([
            'plan_id' => $request->plan_id,
            'payment_type' => $request->payment_type,
            'start_date' => now(),
            'end_date' => $request->payment_type == 1 ? now()->addMonth() : now()->addYear(),
        ]);

        auth()->login($user);

        return redirect()->route('home')->with(['success' => 'Success']);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')->with(['success' => 'Success']);
    }
}
