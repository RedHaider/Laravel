@extends('layouts.app')

@section('content')
   <div class="m-auto w-4/5 py-24">
      <div class="text-center">
        <img src="{{ asset('images/'.$car->image_path) }}" 
        class="w-10/12 mb-8 shadow-xl" alt="">
        <h1 class="text-5xl uppercase bold">
            {{ $car->name }}
        </h1>
      </div>
     
      <div class="w-5/6 py-10">
    

        <div class="m-auto">
            
            <span class="uppercase text-blue-500 font-bold text-xs italic">
                 Founded : {{ $car->founded }}
            </span>
        
            <h2 class="text-grey-700 text-5xl">
                <a href="/cars/{{ $car->id }}">
                {{ $car->name }}
                </a>
            </h2>
            <p class="text-lg text-gray-700 py-6 ">
                {{ $car->description }}
            </p>
             <table class="table-auto">
              <tr class="bg-blue-100">
                <th class="w-1/4 border-4 border-gray-500">
                  Model
                </th>
                <th class="w-1/4 border-4 border-gray-500">
                  Engine
                </th>
                <th class="w-1/4 border-4 border-gray-500">
                  Date
                </th>
              </tr>
              @forelse ($car->carModels as $model)
                <tr>
                  <td class="border-4 border-gray-500">
                    {{ $model->model_name }}
                  </td>
                  <td  class="border-4 border-gray-500">
                    @foreach ($car->engines as $engine)
                        @if ($model->id == $engine->model_id)
                          {{ $engine->engine_name }}
                        @endif
                    @endforeach
                  </td>
                  <td class="border-4 border-gray-500">
                    {{ date('d-m-y', strtotime($car->productionDate->created_at)) }}
                  </td>
                </tr>
              @empty
                <p>No car Models Found</p>
              @endforelse
             </table>
             <p>
              Product types:
              @forelse ($car->products as $product)
                  {{ $product->name }}
              @empty
                  No car Product description
              @endforelse
             </p>
            <hr class="mt-4 mb-8">
        </div>
        
      </div>
    </div>
   
@endsection