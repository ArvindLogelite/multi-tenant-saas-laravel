<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="max-w-7xl mx-auto py-8 px-4">

        <!-- Header -->
        <div class="bg-white rounded-xl shadow-md p-6 flex justify-between items-center">

            <div>

                <h1 class="text-3xl font-bold text-gray-800">
                    Company Management
                </h1>

                <p class="text-gray-500 mt-1">
                    Welcome, {{ Auth::user()->name }}
                </p>

            </div>

            <div class="flex gap-3">

                <a href="{{ route('dashboard') }}"
                    class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-3 rounded-lg">
                    Dashboard
                </a>

                <a href="{{ route('tenants.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">
                    + Create Company
                </a>

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button
                        class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-lg">
                        Logout
                    </button>

                </form>

            </div>

        </div>

        @if(session('success'))

            <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg mt-6">
                {{ session('success') }}
            </div>

        @endif

        <!-- Companies Table -->

        <div class="bg-white rounded-xl shadow-md mt-6 overflow-hidden">

            <table class="min-w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="px-6 py-4 text-left">ID</th>
                        <th class="px-6 py-4 text-left">Company</th>
                        <th class="px-6 py-4 text-left">Schema</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($companies as $company)

                        <tr class="border-t hover:bg-gray-50">

                            <td class="px-6 py-4">
                                {{ $company->id }}
                            </td>

                            <td class="px-6 py-4 font-medium">
                                {{ $company->company_name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $company->schema_name }}
                            </td>

                            <td class="px-6 py-4">

                                @if($company->is_active)

                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                                        Active
                                    </span>

                                @else

                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4 text-center">

                                <form action="{{ route('tenants.toggleStatus', $company) }}" method="POST">

                                    @csrf
                                    @method('PATCH')

                                    @if($company->is_active)

                                        <button
                                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
                                            Deactivate
                                        </button>

                                    @else

                                        <button
                                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                                            Activate
                                        </button>

                                    @endif

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="py-10 text-center text-gray-500">
                                No Companies Found
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>