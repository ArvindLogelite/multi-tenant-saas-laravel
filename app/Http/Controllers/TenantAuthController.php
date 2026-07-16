<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TenantAuthController extends Controller
{
    public function showLoginForm()
    {
        $tenants = Tenant::where('is_active', true)->get();

        return view('tenant.auth.login', compact('tenants'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tenant nikalo
        $tenant = Tenant::where('id', $request->tenant_id)
            ->where('is_active', true)
            ->first();

        if (!$tenant) {
            return back()->with('error', 'Company is inactive.');
        }

        // Tenant schema ke users table me user search karo
        $user = DB::table($tenant->schema_name . '.users')
            ->where('email', $request->email)
            ->first();

        if (!$user) {
            return back()->with('error', 'Invalid Email or Password.');
        }

        // Password verify
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid Email or Password.');
        }

        // Session Create
        session([
            'tenant_logged_in' => true,
            'tenant_id' => $tenant->id,
            'tenant_schema' => $tenant->schema_name,
            'tenant_name' => $tenant->company_name,
            'tenant_user_id' => $user->id,
            'tenant_user_name' => $user->name,
            'tenant_user_email' => $user->email,
        ]);

        return redirect()->route('tenant.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->forget([
            'tenant_logged_in',
            'tenant_id',
            'tenant_schema',
            'tenant_name',
            'tenant_user_id',
            'tenant_user_name',
            'tenant_user_email',
        ]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('tenant.login')
            ->with('success', 'Logged out successfully.');
    }
}
