<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tasks</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="max-w-7xl mx-auto py-8 px-4">

        <!-- Header -->
        <div class="bg-white rounded-xl shadow-md p-6 flex justify-between items-center">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    My Tasks
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

                <a href="{{ route('tasks.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">
                    + Create Task
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

        @if(session('success'))

            <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg mt-6">
                {{ session('success') }}
            </div>

        @endif

        <!-- Tasks Table -->

        <div class="bg-white rounded-xl shadow-md mt-6 overflow-hidden">

            <table class="min-w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="px-6 py-4 text-left">#</th>
                        <th class="px-6 py-4 text-left">Title</th>
                        <th class="px-6 py-4 text-left">Description</th>
                        <th class="px-6 py-4 text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($tasks as $task)

                        <tr class="border-t hover:bg-gray-50">

                            <td class="px-6 py-4">
                                {{ $task->id }}
                            </td>

                            <td class="px-6 py-4 font-medium">
                                {{ $task->title }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $task->description }}
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-4">

                                    <a href="{{ route('tasks.edit', $task->id) }}"
                                        class="text-blue-600 hover:text-blue-800 font-semibold">
                                        Edit
                                    </a>

                                    <form action="{{ route('tasks.destroy', $task->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Are you sure you want to delete this task?')"
                                            class="text-red-600 hover:text-red-800 font-semibold">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center py-10 text-gray-500">
                                No Tasks Found
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>