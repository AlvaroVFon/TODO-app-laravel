<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>TODO app</title>
</head>

<body class="min-h-[100dvh] flex flex-col items-center justify-center gap-5">
    <a href={{ url('logout') }}
        class="absolute top-20 right-24 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 duration-300">
        Logout
    </a>

    <h1 class="text-4xl p-3 font-semibold bg-blue-500 w-2/3 text-center text-white rounded border">TODO APP 📝</h1>
    <main class="w-full flex justify-center">
        <form action="/task" method="POST" class="flex flex-col gap-2 items-start border rounded w-2/3">
            @csrf
            <h3 class="p-2 rounded-t w-full bg-blue-500 text-white font-bold">New task</h3>
            <div class="flex flex-col p-2 w-full">
                <label for="title" class="font-bold mb-2">Task title: </label>
                <input type="text" name="title" id="title" class="form-input rounded" required>
            </div>
            <div class="flex flex-col p-2 w-full">
                <label for="description" class="font-bold mb-2">Task description: </label>
                <input type="text" name="description" id="description" class="form-input rounded" required>
            </div>
            <div class="w-full flex justify-end">

                <button type="submit"
                    class="text-blue-500 ml-2 hover:text-white border border-blue-500 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-700 duration-300">Create
                    Task</button>
            </div>
        </form>
    </main>
    <section class="w-full flex justify-center">
        @if (count($tasks) > 0)
            <div class="w-2/3 flex flex-col gap-3 border rounded p-2">
                @foreach ($tasks as $task)
                    <ul class='grid grid-cols-5 font-bold border-b pb-2'>
                        <li>Task ID</li>
                        <li>Task title</li>
                        <li>Description</li>
                    </ul>
                    <ul class="grid grid-cols-5">
                        <li class="flex items-center justify-start pl-3">{{ $task->id }}</li>
                        <li class="flex justify-start items-center font-semibold">{{ $task->title }}</li>
                        <li class="items-center">{{ $task->description }}</li>
                        <li class="flex items-center justify-center">
                            <form action={{ url('edit/' . $task->id) }}>
                                @csrf
                                <button
                                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit</button>

                            </form>
                        </li>
                        <li class="flex justify-center items-center">
                            <form method="POST" action="{{ url('task/' . $task->id) }}">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>

                            </form>
                        </li>
                    </ul>
                @endforeach
            </div>
        @endif
    </section>
</body>

</html>
