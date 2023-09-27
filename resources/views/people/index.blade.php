<x-layout>
    @auth
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4">
        
        @unless (count($people) == 0)

        @foreach ($people as $person)
        <x-people-card :person="$person"/> 
        @endforeach

        @else
        <p>No Persons Found</p>
        @endunless
    </div>

    <div class="mt-5 p-4">
        {{ $people->links() }}
    </div>
    @else
    <div class="mx-5">
        You are not logged in
    </div>
    @endauth
</x-layout>
