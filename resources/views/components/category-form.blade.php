
@props(['action', 'method', 'category', 'image', 'nailpolishes'])
 
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
@csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name' , $category->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <h3 class="font-semibold text-lg mb-4 pt-5">Assign this category to existing nailpolishes</h3>
        <div>
            @foreach ($nailpolishes as $nailpolish)
            <div>
                <input type="checkbox" id="checkbox" name="nailpolishes" value="{{ $nailpolish->id }}">
                <label for="checkbox" class="ml-2">{{$nailpolish->name}}</label>
            </div>
            @endforeach
        </div>
    </div>
    <div>
        <x-primary-button>
            {{ isset($category) ? 'Update Category' : 'Add Category' }}
        </x-primary-button>
    </div>
</form>