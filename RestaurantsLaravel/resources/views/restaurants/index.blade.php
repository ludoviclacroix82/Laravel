@foreach ($restaurants as $restaurant)
    <h2>{{$restaurant->name}}</h2>
    <p>{{$restaurant->description}}</p>
@endforeach