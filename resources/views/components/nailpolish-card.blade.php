@props(['name', 'description', 'image'])
<div class="ps-4 border rounded-lg shadow-md p-g bg-stone-200 hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-2xl">{{$name}}</h4>
    <img src="{{asset( 'images/nailpolishes/' .$image)}}" alt="{{$name}}"></img>
    <p class="text-slate-800 text-lg">{{$description}}</p>
</div>