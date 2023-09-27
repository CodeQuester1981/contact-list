@props(['person'])

<x-card>
    <a class="text-black text-center hover:underline decoration-cyan-700" href="/people/{{ $person->id }}">
        <h4 class="text-cyan-700 text-[22px]">{{ $person->name }} <i class="fa-solid fa-square-arrow-up-right"></i></h4>
    </a><br />
    <div class="text-black md:grid md:grid-cols-2 gap-1 space-y-2 md:space-y-0">
        <div><p>Full Name:</p></div>
        <div><p>{{ $person->name }} {{ $person->surname }}</p></div>
        <div><p>Email Address:</p></div>
        <div><p>{{ $person->email }}</p></div>
    </div>
</x-card>
