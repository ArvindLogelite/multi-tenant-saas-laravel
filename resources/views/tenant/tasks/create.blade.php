<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="max-w-7xl mx-auto py-8 px-4">

        <!-- Header -->
        <div class="bg-white rounded-xl shadow-md p-6 flex justify-between items-center">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Create Task
                </h1>

                <p class="text-gray-500 mt-1">
                    Welcome, {{ session('tenant_user_name') }}
                </p>
            </div>

            <div class="flex gap-3">

                <a href="{{ route('tenant.dashboard') }}"
                    class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-3 rounded-lg">
                    Dashboard
                </a>

                <a href="{{ route('tasks.index') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg">
                    View Tasks
                </a>

                <form action="{{ route('tenant.logout') }}" method="POST">

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

            <form action="{{ route('tasks.store') }}" method="POST">

                @csrf

                <div class="mb-6">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Task Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>

                    @error('title')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-6">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('description') }}</textarea>

                    @error('description')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <div class="flex gap-3">

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium">
                        Save Task
                    </button>

                    <a href="{{ route('tasks.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-medium">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>

</html>