<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md bg-white rounded-xl shadow-xl p-8">

            <div class="text-center mb-8">

                <h1 class="text-3xl font-bold text-gray-800">
                    Tenant Login
                </h1>

                <p class="text-gray-500 mt-2">
                    Login to your company account
                </p>

            </div>

            @if(session('error'))
            <div class="mb-5 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg">
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('tenant.login.submit') }}" method="POST">

                @csrf

                <div class="mb-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Company
                    </label>

                    <select
                        name="tenant_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option value="">Select Company</option>

                        @foreach($tenants as $tenant)

                        <option value="{{ $tenant->id }}">
                            {{ $tenant->company_name }}
                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-5">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="Enter email"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>

                </div>

                <div class="mb-6">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter password"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>

                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-200">
                    Login
                </button>

            </form>

        </div>

    </div>

</body>

</html>