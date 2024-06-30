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
    <main class="w-full flex flex-col justify-center items-center">
        <form action="/login" method="POST" class="flex flex-col gap-2 items-start border rounded w-1/3">
            @csrf
            <h3 class="bg-gray-100 p-2 rounded-t w-full">Login</h3>
            <div class="flex flex-col p-2 w-full">
                <label for="email" class="font-bold mb-2">Email: </label>
                <input type="email" name="email" id="email" class="border rounded h-8" required>
            </div>
            <div class="flex flex-col p-2 w-full">
                <label for="password" class="font-bold mb-2">Password: </label>
                <input type="password" name="password" id="password" class="border rounded h-8" required>
            </div>
            <button class="border p-1 m-2 rounded mb-8"> Login</button>
        </form>

        <p>
            Don't have an account?
            <a href={{ route('signup') }} class="text-orange-400"> Sign up</a>
        </p>
</body>

</html>
