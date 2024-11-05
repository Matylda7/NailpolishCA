@props(['name', 'description', 'image'])
<div class="border rounded-lg shadow-md p-g bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{$name}}</h4>
    <img src="{{asset( 'images/nailpolishes/' .$image)}}" alt="{{$name}}"></img>
    <p class="text-gray-800">{{$description}}</p>
</div>