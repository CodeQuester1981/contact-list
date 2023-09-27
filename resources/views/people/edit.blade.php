<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Edit Contact</h2>
        <p class="mb-4">Edit: {{$person->name}}</p>
      </header>
  
      <form method="POST" action="/people/{{$person->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
          <label for="name" class="inline-block text-lg mb-2">Name</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
            value="{{$person->name}}" />
  
          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="surname" class="inline-block text-lg mb-2">Surname</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="surname"
            value="{{$person->surname}}" />
  
          @error('surname')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="id_number" class="inline-block text-lg mb-2">ID number</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="id_number"
            value="{{$person->id_number}}" />
  
          @error('id_number')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="email" class="inline-block text-lg mb-2">
            Contact Email
          </label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$person->email}}" />
  
          @error('email')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="mobile_number" class="inline-block text-lg mb-2">
            Cell Number
          </label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="mobile_number"
            value="{{$person->mobile_number}}" />
  
          @error('mobile_number')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="mb-6">
          <button class="bg-gray-700 hover:bg-cyan-700 text-white rounded py-2 px-4">
            Update Contact
          </button>
  
          <a href="/" class="text-black ml-4"> Back </a>
        </div>
      </form>
    </x-card>
  </x-layout>