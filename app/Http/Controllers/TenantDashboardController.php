<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenantDashboardController extends Controller
{
    public function index()
    {
        $schema = session('tenant_schema');

        $totalTasks = DB::table($schema . '.tasks')->count();

        $recentTasks = DB::table($schema . '.tasks')
            ->latest()
            ->limit(5)
            ->get();

        return view('tenant.dashboard', compact(
            'totalTasks',
            'recentTasks'
        ));
    }
}
