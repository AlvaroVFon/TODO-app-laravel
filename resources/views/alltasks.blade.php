<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="flex flex-col justify-center items-center gap-5 min-h-[100dvh]">
    <h1 class='text-4xl p-3 font-semibold bg-blue-500 w-2/3 text-center text-white rounded border"'>All tasks</h1>
    <section class="w-full flex justify-center">
        @if (count($tasks) > 0)
            <div class="w-2/3 flex flex-col gap-3 border rounded p-2">
                <ul class='grid grid-cols-5 font-bold border-b pb-2'>
                    <li>Task ID</li>
                    <li>Task title</li>
                    <li>Description</li>
                </ul>
                @foreach ($tasks as $task)
                    <ul class="grid grid-cols-5 items-center border-b last-of-type:border-none">
                        <li class="flex items-center justify-start pl-3">{{ $task->id }}</li>
                        <li class="flex justify-start items-center font-semibold">{{ $task->title }}</li>
                        <li class="items-center col-span-2">{{ $task->description }}</li>
                        <li class="flex items-center justify-center">
                            <form action={{ url('edit/' . $task->id) }}>
                                @csrf
                                <button
                                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit</button>

                            </form>
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

    {{ $tasks->links() }}

    <a href={{ url('/') }}>Back to index</a>
</body>

</html>
