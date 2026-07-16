<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Tenant Panel' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="max-w-7xl mx-auto py-8 px-4">

    <div class="bg-white rounded-xl shadow-md p-6 flex justify-between items-center">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                {{ $title ?? 'Tenant Panel' }}
            </h1>

            <p class="text-gray-500 mt-1">
                Welcome, {{ session('tenant_user_name') }}
            </p>
        </div>

        <div class="flex gap-3">

            <a href="{{ route('tenant.dashboard') }}"
               class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded">
                Dashboard
            </a>

            <a href="{{ route('tasks.index') }}"
               class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                Tasks
            </a>

            <form action="{{ route('tenant.logout') }}" method="POST">
                @csrf

                <button
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                    Logout
                </button>
            </form>

        </div>

    </div>

    <div class="mt-8">
        {{ $slot }}
    </div>

</div>

</body>

</html>