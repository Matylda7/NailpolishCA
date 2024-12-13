<!-- ideas
 Make so you can click on author name and direct to view their page
 make so you can view list of categorie....maybe filter? -->



<!-- The main page with all nailpolishes listed and an add and delete button -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-stone-800 leading-tight">
            {{ __('All Nailpolishes') }}
        </h2>
    </x-slot>

    <x-alert-success>
        {{ session('success')}}

    </x-alert-success>
    <x-alert-error>
        {{ session('error')}}

    </x-alert-error>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-4xl mb-7">List of Nailpolishes:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
                        
                        @foreach($nailpolishes as $nailpolish)
                            <a href="{{ route('nailpolishes.show', $nailpolish) }}">
                                <x-nailpolish-card
                                    :name="$nailpolish->name"
                                    :image="$nailpolish->image"
                                    :description="$nailpolish->description"

                                />
                            </a> 
                            @if(auth()->user()->role === 'admin') 
                           
                                <div class="mt-4 space-x-2" >
                                    <button><a href="{{ route('nailpolishes.edit', $nailpolish) }}" class="text-slate-500 bg-slate-200 hover:bg-slate-500 hover:text-slate-200 font-bold py-2 px-4 rounded">Edit</a></button>

                                    <form action="{{ route('nailpolishes.destroy', $nailpolish) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this nailpolish?');">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="bg-slate-500 hover:bg-slate-800 text-slate-200 font-bold py-2 px-4 rounded my-3">
                                            Delete 
                                        </button>
                                    </form>
                                </div> 
                            @endif
                        @endforeach
                    
                    </div>
                        
<!-- -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>