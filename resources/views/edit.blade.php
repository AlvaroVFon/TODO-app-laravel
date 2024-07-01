<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Update task</title>
</head>

<body class="min-h-[100dvh] flex items-center">
    <main class="w-full flex flex-col gap-3 items-center justify-center">
        <a href={{ url('logout') }}
            class="absolute top-20 right-24 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 duration-300">Logout</a>
        <form method="POST" action={{ route('update', ['id' => $task->id]) }}
            class="flex flex-col gap-2 items-start border rounded w-2/3">
            @csrf
            @method('PUT')
            <h3 class="bg-blue-500 text-white font-bold p-2 rounded-t w-full">Update Task: {{ $task->title }}</h3>
            <div class="flex flex-col p-2 w-full">
                <label for="title" class="font-bold mb-2">New title: </label>
                <input type="text" name="title" id="title" class="form-input rounded"
                    value={{ $task->title }}>
            </div>
            <div class="flex flex-col p-2 w-full">
                <label for="description" class="font-bold mb-2">New description: </label>
                <input type="text" name="description" id="description" class="form-input rounded"
                    value={{ $task->description }}>
            </div>
            <div class="w-full flex justify-end">
                <button type="submit"
                    class="text-blue-500 ml-2 hover:text-white border border-blue-500 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-700 duration-300">Update
                    Task</button>
            </div>
        </form>
        <div class="w-2/3">
            <a href={{ url('/') }} class="p-2 border rounded w-16 hover:bg-gray-50">Back</a>
        </div>
    </main>
</body>

</html>
