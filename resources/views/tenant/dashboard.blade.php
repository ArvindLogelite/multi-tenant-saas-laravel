<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="max-w-7xl mx-auto py-8 px-4">

        <!-- Header -->
        <div class="bg-white rounded-xl shadow-md p-6 flex justify-between items-center">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Tenant Dashboard
                </h1>

                <p class="text-gray-500 mt-1">
                    Welcome, {{ session('tenant_user_name') }}
                </p>
            </div>

            <div class="flex gap-3">


                <form action="{{ route('tenant.logout') }}" method="POST">

                    @csrf

                    <button
                        class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-lg">
                        Logout
                    </button>

                </form>

            </div>

        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500 text-sm">
                    Company
                </p>

                <h2 class="text-2xl font-bold mt-2">
                    {{ session('tenant_name') }}
                </h2>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500 text-sm">
                    Logged In User
                </p>

                <h2 class="text-2xl font-bold mt-2">
                    {{ session('tenant_user_name') }}
                </h2>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500 text-sm">
                    Email
                </p>

                <h2 class="text-lg font-semibold mt-2 break-all">
                    {{ session('tenant_user_email') }}
                </h2>
            </div>

        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow mt-8 p-6">

            <h2 class="text-xl font-semibold mb-5">
                Quick Actions
            </h2>

            <div class="flex gap-4">

                <a href="{{ route('tasks.index') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg">
                    View Tasks
                </a>

                <a href="{{ route('tasks.create') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg">
                    Create Task
                </a>

            </div>

        </div>

    </div>

</body>

</html>