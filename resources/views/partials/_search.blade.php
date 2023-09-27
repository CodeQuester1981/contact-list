<form action="/">
    <div class="relative border-2 border-gray-100 m-4 rounded-lg">
      <div class="absolute top-4 left-3">
        <i class="fa fa-search text-gray-400 z-20"></i>
      </div>
      <input type="text" name="search" class="text-black h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
        placeholder="Search by name, surname, email, cell number, interest or language" />
      <div class="absolute top-2 right-2">
        <button type="submit" class="h-10 w-20 text-white rounded-lg bg-gray-700 hover:bg-cyan-700">
          Search
        </button>
      </div>      
    </div>
    <div class="mb-20">        
        <button class="float-right bg-gray-700 hover:bg-cyan-700 rounded text-white p-3 mx-5 text-center">
            <a href="/people/create">Create Contact</a>
        </button>        
    </div>
  </form>