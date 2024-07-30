@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@foreach ($restaurants as $restaurant)
    <a href="/restaurant/show/{{$restaurant->id}}">
        <h2>{{$restaurant->name}} ({{$restaurant->review}})</h2>
    </a>

    <p>{{$restaurant->description}}</p>
@endforeach