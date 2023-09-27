<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Create a Contact</h2>
      </header>
  
      <form method="POST" action="/people" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
          <label for="name" class="inline-block text-lg mb-2">Name</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
            value="{{old('name')}}" />
  
          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="surname" class="inline-block text-lg mb-2">Surname</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="surname"
            value="{{old('surname')}}" />
  
          @error('surname')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="id_number" class="inline-block text-lg mb-2">Id Number</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="id_number"
            value="{{old('id_number')}}" />
  
          @error('id_number')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="email" class="inline-block text-lg mb-2">
            Contact Email
          </label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" 
            value="{{old('email')}}" />
  
          @error('email')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
            <label for="mobile_number" class="inline-block text-lg mb-2">
              Cell Number
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="mobile_number" 
              value="{{old('mobile_number')}}" />
    
            @error('mobile_number')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="language" class="inline-block text-lg mb-2">
                Languages
            </label>
            <select name="language[]" class="border border-gray-200 rounded p-2 w-full" single="single">
                <option value="English">English</option>
                <option value="Spanish">Spanish</option>
                <option value="French">French</option>
                <option value="German">German</option>
                <option value="Chinese">Chinese</option>
                <option value="Japanese">Japanese</option>
                <option value="Italian">Italian</option>
                <option value="Portuguese">Portuguese</option>
                <option value="Russian">Russian</option>
                <option value="Arabic">Arabic</option>
            </select>
        </div>

        <div class="mb-6">
            <label for="interests" class="inline-block text-lg mb-2">
                Interests
            </label>
            <select name="interests[]" class="border border-gray-200 rounded p-2 w-full" multiple>
                <option value="Archery">Archery</option>
                <option value="Boxing">Boxing</option>
                <option value="Aquascaping">Aquascaping</option>
                <option value="Dog Sled Racing">Dog Sled Racing</option>
                <option value="Mountain Climbing">Mountain Climbing</option>
                <option value="Gaming">Gaming</option>
            </select>
        </div>
  
        <div class="mb-6">
          <button type="submit" class="text-white rounded py-2 px-4 bg-gray-700 hover:bg-cyan-700">
            Create this Contact
          </button>
  
          <a href="/" class="text-black ml-4"> Back </a>
        </div>
      </form>
    </x-card>
  </x-layout>