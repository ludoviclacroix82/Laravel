<div>
<form action="{{ $restaurant ? route('restaurants.update', $restaurant->id) : route('restaurants.store') }}" method="POST">
    @csrf
    @if($restaurant)
        @method('PUT')
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{dd($restaurant)}}
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $restaurant->name ?? '') }}">
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="address">Address</label>
        <input type="text" id="address" name="address" value="{{ old('address', $restaurant->address ?? '') }}">
        @error('address')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="zip_code">Zip Code</label>
        <input type="number" id="zip_code" name="zip_code" value="{{ old('zip_code', $restaurant->zip_code ?? '') }}">
        @error('zip_code')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="zip_code">Town</label>
        <input type="text" id="town" name="town" value="{{ old('town', $restaurant->town ?? '') }}">
        @error('town')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="country">Country</label>
        <input type="text" id="country" name="country" value="{{ old('country', $restaurant->country ?? '') }}">
        @error('country')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description">{{ old('description', $restaurant->description ?? '') }}</textarea>
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="review">Review</label>
        <input type="number" id="review" name="review" value="{{ old('review', $restaurant->review ?? '') }}">
        @error('review')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">{{ $restaurant ? 'Update' : 'Create' }}</button>
</form>

</div>