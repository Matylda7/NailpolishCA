<!-- The main page with all categories listed and an add and delete button -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Categories') }}
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Categories:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
                        
                        @foreach($categories as $category)
                            <!-- <a href="{{ route('categories.show', $category) }}"> -->
                                <x-category-card
                                    :name="$category->name"

                                />
                            </a> 
                            @if(auth()->user()->role === 'admin') 
                           
                                <div class="mt-4 space-x-2" >
                                    <button><a href="{{ route('categories.edit', $category) }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">Edit</a></button>

                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded my-3">
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