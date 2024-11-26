<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form class="mt-4" method="POST" action="{{ route('reviews.update', $review) }}">
            @csrf
            @method('put')
            <label for="rating" class="block font-medium text-sm text-gray-700 mb-2">Rating</label>
                                <div class="flex">
                                    <div class="flex items-center me-4">
                                    <input type="radio" id="rating" name="rating" value="1" required>
                                    <label for="rating" class="ml-2">1</label>
                                    </div>
                                    <div class="flex items-center me-4">
                                    <input type="radio" id="rating" name="rating" value="2">
                                    <label for="rating" class="ml-2">2</label>
                                    </div>
                                    <div class="flex items-center me-4">
                                    <input type="radio" id="rating" name="rating" value="3">
                                    <label for="rating" class="ml-2">3</label>
                                    </div>
                                    <div class="flex items-center me-4">
                                    <input type="radio" id="rating" name="rating" value="4">
                                    <label for="rating" class="ml-2">4</label>
                                    </div>
                                    <div class="flex items-center">
                                    <input type="radio" id="rating" name="rating" value="5">
                                    <label for="rating" class="ml-2">5</label>
                                    </div>
                                </div>
            <textarea
                name="comment"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('comment', $review->comment) }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('nailpolishes.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>