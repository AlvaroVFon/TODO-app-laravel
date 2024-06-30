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

    {{-- FIXME : title and description sended as null --}}
    <form method="POST" action= {{ route('update', ['id'=>$task->id]) }} class="flex flex-col gap-2 items-start border rounded w-1/3">
      @csrf 
      @method('PUT')
      <h3 class="bg-gray-100 p-2 rounded-t w-full">Update Task: {{ $task->title }}</h3>
      <div class="flex flex-col p-2 w-full">
        <label for="title" class="font-bold mb-2">New title: </label>
        <input type="text" name="title" id="title" class="border rounded h-8">
      </div>
      <div class="flex flex-col p-2 w-full">
        <label for="description" class="font-bold mb-2">New description: </label>
        <input type="text" name="description" id="description" class="border rounded h-8">
      </div>
      <button class="border p-1 m-2 rounded mb-8"> ➕ Update Task</button>
    </form>
    <div class="w-1/3">
      <a href={{ url('/') }} class="p-2 border rounded w-16">Back</a>
    </div>
  </main>
</body>
</html>