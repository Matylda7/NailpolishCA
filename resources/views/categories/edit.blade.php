<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit the Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">                    
                    <h3 class="font-semibold text-lg mb-4">Category Details</h3>
                    
                            <!--the form will be submitted to categories.update, the fields will be prefilled with the specific category -->
                            <x-category-form                            
                               :action="route('categories.update', $category)"
                               :method="'PATCH'"
                               :category="$category"
                               :nailpolishes="$nailpolishes"  
                               :categoryNailpolishes='$categoryNailpolishes'                             
                            />
                          
                </div>
            </div>
        </div>
    </div>
</x-app-layout>