<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Nailpolishes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Nailpolish Details</h3>
                    

                            <x-nailpolish-details
                                :name="$nailpolish->name"
                                :image="$nailpolish->image"
                                :description="$nailpolish->description"

                            />
                    <h4 class="font-semibold text-md mt-8">Reviews</h4>
                    @if($nailpolish->reviews->isEmpty())
                        <p class="text-gray-600">No reviews yet.</p>
                    @else
                        <ul class="mt-4 space-y-4">
                            @foreach($nailpolish->reviews as $review)

                           

                                <li class="bg-gray-100 p-4 rounded-lg">
                                    <p class="font-semibold">{{ $review->user->name }} ({{ $review->created_at->format('M d, Y') }})</p>
                                    <p>Rating: {{ $review->rating }} /5</p>
                                    <p>{{ $review->comment }}</p>
                                </li>
                                @unless ($review->created_at->eq($review->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            @endforeach
                        </ul>
                        
                    @endif
                       
                    <h4 class="font-semibold text-md mt-8">Add a Review</h4>
                    <form action="{{ route('reviews.store', $nailpolish) }}" method="POST" class="mt-4">
                        @csrf
                        
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
                            
                            
                            <!-- <select name="rating" id="rating" class="mt-1 block w-full" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select> -->
                        </div>

                        <div class="mb-4">
                            <label for="comment" class="block font-medium text-sm text-gray-700">Comment</label>
                            <textarea name="comment" id="comment" rows="3" class="mt-1 block w-full" placeholder="Write your review here..."></textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit Review</button>

                    </form>
                    
                        
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

