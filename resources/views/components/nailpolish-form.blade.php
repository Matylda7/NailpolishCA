
@props(['action', 'method', 'nailpolish'])
 
 <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
     @csrf
     @if($method === 'PUT' || $method === 'PATCH')
         @method($emthod)
     @endif
  
     <div class="mb-4">
         <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
         <input
             type="text"
             name="name"
             id="name"
             value="{{ old('title' , $nailpolish->name ?? '') }}"
             required
             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            
         @error('name')
             <p class="text-sm text-red-600">{{ $message }}</p>
         @enderror
     </div>

        
         <div class="mb-4">
             <label for="image" class="block text-sm font-medium text-gray-700">Nailpolish image</label>
             <input
             type="file"
             name="image"
             id="image"
             {{ isset($nailpolish) ?" : 'required'}}
             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
             @error('image')
             <p class="text-sm text-red-600">{{$message}}</p>
             @enderror
         </div>
         
  
         @isset($nailpolish->image)
         <div class="mb-4">
             <img src="{{asset( 'images/nailpolish' . $nailpolish->image)}}" alt="$nailpolish->name" class="w-24 h-32 object-cover">
         </div>
         @endisset
  
         <div>
             <x-primary-button>
                 {{ isset($nailpolish) ? 'Update Nailpolish' : 'add Nailpolish' }}
             </x-primary-button>
         </div>
     </form>
