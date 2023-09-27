<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>

  <title>Contact List</title>
</head>

<body class="m-10 bg-gray-800 text-white">
  <nav class="flex justify-between items-center mb-4">
    <ul class="flex space-x-6 mr-6 text-lg">
      @auth
      <li class="mx-5 float-right">
        <form class="inline" method="POST" action="/logout">
          @csrf
          <button type="submit">
            <i class="fa-solid fa-arrow-right-to-bracket"></i> Logout
          </button>
        </form>
      </li>
      @else
      <li class="p-3">
        <a href="/register" class="hover:text-cyan-700 mx-5"><i class="fa-solid fa-user-plus"></i> Register</a>
      </li>
      <li class="p-3">
        <a href="/login" class="hover:text-cyan-700"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
      </li>
      @endauth
    </ul>
  </nav>
    <main>
      {{$slot}}
    </main>
 
  <x-flash />

</body>

</html>