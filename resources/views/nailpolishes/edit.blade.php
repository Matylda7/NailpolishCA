<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit the Nailpolish') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-stone-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Nailpolish Details</h3>
                    
                            <!--the form will be submitted to nailpolishes.update, the fields will be prefilled with the specific nailpolish -->
                            <x-nail-polish-form                            
                               :action="route('nailpolishes.update', $nailpolish)"
                               :method="'PATCH'"
                               :nailpolish="$nailpolish"
                            />
                          
                </div>
            </div>
        </div>
    </div>
</x-app-layout>