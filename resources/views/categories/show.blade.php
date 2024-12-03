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
                    <h3 class="font-semibold text-lg mb-4">Category Details</h3>
                    

                            <x-category-card
                                :name="$category->name"
                              

                            />
                            <h4 class="font-semibold text-md mt-8">Nailpolishes</h4>
                    @if($category->nailpolishes->isEmpty())
                        <p class="text-gray-600">No nailpolishes yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>