        @extends('layouts.app')

        @section('content')
        <div class="m-auto w-4/5 py-24">

          <div class="pt-10">
            <a href="cars/create" 
            class="border-b-2 border-dotted italic text-gray-500">
             Add New Car
            </a>
          </div>
            <div class="text-center">
                <h1 class="text-5xl uppercae bold">
                    Cars
                </h1>
            </div>
        

          <div class="w-5/6 py-10">
            @foreach ($cars as $car)

            <div class="m-auto">
                <div class="float-right">
                  <a href="cars/{{ $car->id }}/edit" 
                    class="border-b-2 border-dotted italic text-green-500"
                    >
                    Edit &rarr;
                  </a>
                  <form action="/cars/{{ $car->id }}"  method="POST">
                  @csrf
                  @method('delete')
                  <button class="border-b-2 border-dotted italic text-red-500">
                    Delete &rarr;
                  </button>
                  </form>
                </div>
                <span class="uppercase text-blue-500 font-bold text-xs italic">
                    {{ $car->founded }} 
                </span>
            
                <h2 class="text-grey-700 text-5xl">
                {{ $car->name }}
                </h2>
                <p class="text-lg text-gray-700 py-6 ">
                  {{ $car->description }}    
                </p>
                <hr class="mt-4 mb-8">
            </div>
            @endforeach
          </div>
        </div>
        @endsection