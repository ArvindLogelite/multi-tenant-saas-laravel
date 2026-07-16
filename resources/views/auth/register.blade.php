<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Disabled</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="bg-gray-100">


<div class="min-h-screen flex items-center justify-center">


    <div class="bg-white shadow rounded-xl p-8 text-center max-w-md">


        <h1 class="text-2xl font-bold text-gray-800 mb-3">
            Registration Disabled
        </h1>


        <p class="text-gray-600 mb-6">
            Account creation is managed by administrator.
            Please contact your administrator to get access.
        </p>


        <a href="{{ route('login') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">

            Go To Login

        </a>


    </div>


</div>


</body>

</html>