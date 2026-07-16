<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\TenantMigrationService;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Tenant::latest()->get();

        return view('tenants.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name'   => 'required|max:255|unique:tenants,company_name',
            'schema_name'    => 'required|alpha_dash|unique:tenants,schema_name',
            'admin_name'     => 'required|max:255',
            'admin_email'    => 'required|email',
            'admin_password' => 'required|min:6',
        ]);

        DB::beginTransaction();

        try {

            // Check schema already exists in PostgreSQL
            $schemaExists = DB::select("
            SELECT schema_name 
            FROM information_schema.schemata 
            WHERE schema_name = ?
        ", [$request->schema_name]);


            if (!empty($schemaExists)) {

                return back()
                    ->withInput()
                    ->withErrors([
                        'schema_name' => 'Schema name already exists.'
                    ]);
            }


            // Create Tenant
            $tenant = Tenant::create([
                'company_name' => $request->company_name,
                'schema_name'  => $request->schema_name,
                'is_active'    => true,
            ]);


            // Create PostgreSQL Schema
            DB::statement(
                'CREATE SCHEMA "' . $tenant->schema_name . '"'
            );


            // Create tenant tables
            $tenantMigrationService = new TenantMigrationService();

            $tenantMigrationService->migrate(
                $tenant->schema_name
            );


            // Check tenant admin email
            $existingUser = DB::table($tenant->schema_name . '.users')
                ->where('email', $request->admin_email)
                ->exists();


            if ($existingUser) {

                throw new \Exception('Admin email already exists.');
            }


            // Create Tenant Admin
            DB::table($tenant->schema_name . '.users')->insert([

                'name' => $request->admin_name,

                'email' => $request->admin_email,

                'password' => bcrypt($request->admin_password),

                'remember_token' => null,

                'created_at' => now(),

                'updated_at' => now(),

            ]);


            DB::commit();


            return redirect()
                ->route('tenants.index')
                ->with(
                    'success',
                    'Company created successfully.'
                );
        } catch (\Exception $e) {


            DB::rollBack();


            return back()
                ->withInput()
                ->withErrors([
                    'error' => 'Something went wrong while creating company.'
                ]);
        }
    }

    public function toggleStatus(Tenant $tenant)
    {
        $tenant->update([
            'is_active' => !$tenant->is_active
        ]);

        return redirect()->route('tenants.index')
            ->with('success', 'Company status updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
