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
    <a href={{ route('logout') }} class="absolute top-2 right-2 p-3 border border-red-300 rounded">Logout</a>
    <h1 class="text-4xl p-3 font-semibold bg-gray-100 w-1/3 text-center rounded border">TODO APP 📝</h1>
    <main class="w-full flex justify-center">
        <form action="/task" method="POST" class="flex flex-col gap-2 items-start border rounded w-1/3">
            @csrf
            <h3 class="bg-gray-100 p-2 rounded-t w-full">New task</h3>
            <div class="flex flex-col p-2 w-full">
                <label for="title" class="font-bold mb-2">Task title: </label>
                <input type="text" name="title" id="title" class="border rounded h-8" required>
            </div>
            <div class="flex flex-col p-2 w-full">
                <label for="description" class="font-bold mb-2">Task description: </label>
                <input type="text" name="description" id="description" class="border rounded h-8" required>
            </div>
            <button class="border p-1 m-2 rounded mb-8"> ➕ Add Task</button>
        </form>
    </main>
    <section class="w-full flex justify-center">
        @if (count($tasks) > 0)
            <div class="w-1/3 flex flex-col gap-3 border rounded p-2">
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
                                    class="border border-blue-100 text-blue-400 hover:border-blue-400 duration-300 w-16 p-2 rounded">
                                    Edit
                                </button>
                            </form>
                        </li>
                        <li class="flex justify-center items-center">
                            <form method="POST" action="{{ url('task/' . $task->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="border border-red-100 text-red-400 hover:border-red-400 duration-300 p-2 rounded">
                                    Delete
                                </button>
                            </form>
                        </li>
                    </ul>
                @endforeach
            </div>
        @endif
    </section>
</body>

</html>
