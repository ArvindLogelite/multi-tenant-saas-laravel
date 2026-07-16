<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

            <div class="text-center mb-6">

                <h1 class="text-2xl font-bold text-gray-800">
                    Verify Email Address
                </h1>

                <p class="text-gray-500 mt-3 text-sm">
                    Please verify your email address before continuing.
                </p>

            </div>


            @if (session('status') == 'verification-link-sent')

                <div class="bg-green-100 border border-green-300 text-green-700 p-3 rounded mb-5 text-sm">

                    A new verification link has been sent to your email address.

                </div>

            @endif



            <form method="POST" action="{{ route('verification.send') }}">

                @csrf


                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-medium">

                    Resend Verification Email

                </button>


            </form>



            <form method="POST" action="{{ route('logout') }}" class="mt-4">

                @csrf


                <button
                    type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg font-medium">

                    Logout

                </button>


            </form>


        </div>

    </div>

</body>

</html>