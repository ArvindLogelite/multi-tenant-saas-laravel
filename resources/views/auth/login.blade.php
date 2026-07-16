<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

            <div class="text-center mb-8">

                <h1 class="text-3xl font-bold text-gray-800">
                    Super Admin Login
                </h1>

                <p class="text-gray-500 mt-2">
                    Sign in to manage companies
                </p>

            </div>

            @if(session('status'))

                <div class="mb-4 bg-green-100 border border-green-300 text-green-700 p-3 rounded">
                    {{ session('status') }}
                </div>

            @endif

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="mb-5">

                    <label class="block font-medium mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        required
                        autofocus>

                    @error('email')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-5">

                    <label class="block font-medium mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        required>

                    @error('password')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <div class="flex items-center justify-between mb-6">

                    <label class="flex items-center">

                        <input
                            type="checkbox"
                            name="remember"
                            class="mr-2">

                        <span class="text-sm text-gray-600">
                            Remember Me
                        </span>

                    </label>

                    @if (Route::has('password.request'))

                        <a href="{{ route('password.request') }}"
                            class="text-sm text-blue-600 hover:underline">

                            Forgot Password?

                        </a>

                    @endif

                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-medium">

                    Login

                </button>

            </form>

            <div class="text-center mt-6">

                <a href="{{ route('tenant.login') }}"
                    class="text-blue-600 hover:underline">

                    Tenant Login

                </a>

            </div>

        </div>

    </div>

</body>

</html>