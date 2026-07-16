<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

            <div class="text-center mb-6">

                <h1 class="text-2xl font-bold text-gray-800">
                    Forgot Password
                </h1>

                <p class="text-gray-500 mt-2 text-sm">
                    Enter your email address and we will send you a password reset link.
                </p>

            </div>


            @if(session('status'))

                <div class="bg-green-100 border border-green-300 text-green-700 p-3 rounded mb-5">
                    {{ session('status') }}
                </div>

            @endif


            <form method="POST" action="{{ route('password.email') }}">

                @csrf


                <div class="mb-6">

                    <label class="block font-medium mb-2">
                        Email Address
                    </label>


                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        required
                        autofocus>


                    @error('email')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror


                </div>


                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-medium">

                    Send Reset Link

                </button>


            </form>


            <div class="text-center mt-6">

                <a href="{{ route('login') }}"
                    class="text-blue-600 hover:underline">

                    Back to Login

                </a>

            </div>


        </div>

    </div>

</body>

</html>