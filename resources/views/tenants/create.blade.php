<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Company</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="max-w-7xl mx-auto py-8 px-4">

        <!-- Header -->
        <div class="bg-white rounded-xl shadow-md p-6 flex justify-between items-center">

            <div>

                <h1 class="text-3xl font-bold text-gray-800">
                    Create Company
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

                <a href="{{ route('tenants.index') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg">
                    Company List
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

        <!-- Form -->

        <div class="max-w-3xl mx-auto mt-8 bg-white rounded-xl shadow-md p-8">
            @if($errors->has('error'))

            <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-5">
                {{ $errors->first('error') }}
            </div>

            @endif

            <form action="{{ route('tenants.store') }}" method="POST">

                @csrf

                <div class="mb-5">

                    <label class="block mb-2 font-semibold">
                        Admin Name
                    </label>

                    <input
                        type="text"
                        name="admin_name"
                        value="{{ old('admin_name') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3">

                    @error('admin_name')
                    <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-5">

                    <label class="block mb-2 font-semibold">
                        Admin Email
                    </label>

                    <input
                        type="email"
                        name="admin_email"
                        value="{{ old('admin_email') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3">

                    @error('admin_email')
                    <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-5">

                    <label class="block mb-2 font-semibold">
                        Admin Password
                    </label>

                    <input
                        type="password"
                        name="admin_password"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3">

                    @error('admin_password')
                    <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-5">

                    <label class="block mb-2 font-semibold">
                        Company Name
                    </label>

                    <input
                        type="text"
                        name="company_name"
                        value="{{ old('company_name') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3">

                    @error('company_name')
                    <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-6">

                    <label class="block mb-2 font-semibold">
                        Schema Name
                    </label>

                    <input
                        type="text"
                        name="schema_name"
                        value="{{ old('schema_name') }}"
                        placeholder="tenant_google"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3">

                    @error('schema_name')
                    <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                    @enderror

                </div>

                <div class="flex gap-3">

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

                        Save Company

                    </button>

                    <a href="{{ route('tenants.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</body>

</html>