<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  <title>Document</title>
</head>
  <body class="min-h-[100dvh] flex items-center justify-center">
    <main>
      <form action="/addTask" method="POST" class="flex flex-col gap-2 items-start border rounded min-w-96">
          <h3 class="bg-gray-100 p-2 rounded-t w-full">New task</h3>
          <div class="flex flex-col p-2 w-full">
            <label for="task" class="font-bold mb-2">Task</label>
            <input type="text" name="task" id="task" class="border rounded h-8">
          </div>
          <button type="submit" class="border p-1 m-2 rounded mb-8"> ➕ Add Task</button>
      </form>
    </main>
  </body>
</html>