<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Password</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

            <div class="text-center mb-6">

                <h1 class="text-2xl font-bold text-gray-800">
                    Confirm Password
                </h1>

                <p class="text-gray-500 mt-2 text-sm">
                    Please confirm your password before continuing.
                </p>

            </div>


            <form method="POST" action="{{ route('password.confirm') }}">

                @csrf


                <div class="mb-6">

                    <label class="block font-medium mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                        required
                        autocomplete="current-password">


                    @error('password')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-medium">

                    Confirm

                </button>


            </form>


        </div>

    </div>

</body>

</html>