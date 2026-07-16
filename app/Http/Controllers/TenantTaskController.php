<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenantTaskController extends Controller
{
    public function index()
    {
        $schema = session('tenant_schema');

        $tasks = DB::table($schema . '.tasks')
            ->where('user_id', session('tenant_user_id'))
            ->latest()
            ->get();

        return view('tenant.tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tenant.tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $schema = session('tenant_schema');

        DB::table($schema . '.tasks')->insert([
            'user_id' => session('tenant_user_id'),
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        $schema = session('tenant_schema');

        $task = DB::table($schema . '.tasks')
            ->where('id', $id)
            ->where('user_id', session('tenant_user_id'))
            ->first();

        return view('tenant.tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $schema = session('tenant_schema');

        DB::table($schema . '.tasks')
            ->where('id', $id)
            ->where('user_id', session('tenant_user_id'))
            ->update([
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => now(),
            ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $schema = session('tenant_schema');

        DB::table($schema . '.tasks')
            ->where('id', $id)
            ->where('user_id', session('tenant_user_id'))
            ->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}
