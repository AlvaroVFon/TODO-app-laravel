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
            <h3 class="bg-blue-500 text-white text-lg font-bold p-2 rounded-t w-full">Login</h3>
            <div class="flex flex-col p-2 w-full">
                <label for="email" class="font-bold mb-2">Email: </label>
                <input type="email" name="email" id="email"
                    class="form-input rounded @error('email') is-invalid @enderror">

                @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col p-2 w-full">
                <label for="password" class="font-bold mb-2">Password: </label>
                <input type="password" name="password" id="password"
                    class="form-input rounded
                    @error('password') is-invalid @enderror">
                @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full flex justify-end">

                <button type="submit"
                    class="text-blue-500 ml-2 hover:text-white border border-blue-500 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-700 duration-300">Login</button>
            </div>
        </form>

        <p>
            Don't have an account?
            <a href={{ route('signup') }} class="text-blue-500 hover:underline"> Sign up</a>
        </p>

</body>

</html>
