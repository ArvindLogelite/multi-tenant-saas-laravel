<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">


            <div class="text-center mb-6">

                <h1 class="text-2xl font-bold text-gray-800">
                    Reset Password
                </h1>

                <p class="text-gray-500 mt-2 text-sm">
                    Create a new password for your account.
                </p>

            </div>


            <form method="POST" action="{{ route('password.store') }}">

                @csrf


                <input type="hidden" name="token" value="{{ $request->route('token') }}">


                <div class="mb-5">

                    <label class="block font-medium mb-2">
                        Email Address
                    </label>


                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $request->email) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        required
                        autofocus>


                    @error('email')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror


                </div>



                <div class="mb-5">

                    <label class="block font-medium mb-2">
                        New Password
                    </label>


                    <input
                        type="password"
                        name="password"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        required>


                    @error('password')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror


                </div>




                <div class="mb-6">

                    <label class="block font-medium mb-2">
                        Confirm Password
                    </label>


                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        required>


                    @error('password_confirmation')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror


                </div>




                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-medium">

                    Reset Password

                </button>



            </form>


        </div>

    </div>

</body>

</html>