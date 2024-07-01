<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>

<body class="min-h-[100dvh] flex items-center">
    <main class="w-full flex flex-col items-center gap-5">
        <form action="/register" method="POST" class="flex flex-col gap-2 items-start border rounded w-1/3">
            @csrf
            <h3 class="bg-blue-500 text-white font-bold p-2 rounded-t w-full">Sign up</h3>
            @if ($errors->any())
                <div class="w-full flex justify-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="bg-red-400 text-white p-2 rounded">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="flex flex-col p-2 w-full">
                <label for="name" class="font-bold mb-2">User: </label>
                <input type="text" name="name" id="name" class="form-input rounded" required>
            </div>
            <div class="flex flex-col p-2 w-full">
                <label for="email" class="font-bold mb-2">Email: </label>
                <input type="email" name="email" id="email" class="form-input rounded" required>
            </div>
            <div class="flex flex-col p-2 w-full">
                <label for="password" class="font-bold mb-2">Password: </label>
                <input type="password" name="password" id="password" class="form-input rounded" required>
            </div>
            <div class="w-full flex justify-end">

                <button type="submit"
                    class="text-blue-500 ml-2 hover:text-white border border-blue-500 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-700 duration-300">Signup</button>
            </div>
        </form>
        <div class="w-1/3">
            <a href={{ url('/task') }} class="p-2 border rounded w-16 hover:bg-gray-50">Back</a>
        </div>
</body>

</html>
