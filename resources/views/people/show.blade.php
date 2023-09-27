<x-layout>
    <div>
        <a href="/" class="inline-block text-white ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
    </div>   
        
    <x-card class="">
        <div class="sm:grid sm:grid-cols-2 float-right mx-1">
            <button class="bg-gray-700 hover:bg-cyan-700 rounded text-white p-3 mx-1 text-center">
                <a href="/people/{{$person->id}}/edit">Edit Contact</a>
            </button>            
            <form method="POST" action="/people/{{ $person->id }}">
                @csrf
                @method('DELETE')
                <button class="border-solid border-2 border-red-700 text-red-700 hover:bg-gray-700 hover:text-white rounded p-3 text-center">
                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                </button>
            </form>
        </div><br/>
        <a class="text-center" href="/people/{{ $person->id }}">
            <h4>{{ $person->name }}</h4><br />
        </a>       
        @foreach ([
            'Full Name' => $person->name . ' ' . $person->surname,
            'Email Address' => $person->email,
            'Contact Number' => $person->mobile_number,
            'Preferred Language' => $person->language,
            'Interests' => $person->interests,
        ] as $label => $value)
            <div class="flex justify-center md:grid md:grid-cols-2">
                <p class="pl-10 ml-20">{{ $label }}:</p>
                <p>{{ $value }}</p>
            </div>
        @endforeach
    </x-card>
</x-layout>