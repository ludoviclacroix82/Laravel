<div class="clients-form">
    @if ($errors->any())
    <div class="alert alert-danger alert-static">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if($clients)
    <div class="header">
        Modifier Client :  <strong> {{$clients->company}}</strong>
    </div>
    @endif



    <form action="{{ $clients ? route('admin.clients.update', $clients->id) : route('admin.clients.store') }}" method="post">
        @csrf 
        @if($clients)
            @method('patch')
        @endif
        <div class="mb-3">
            <label for="company" class="form-label">Company</label>
            <input type="text" class="form-control" id="company" name="company" placeholder="Enter company name" value="{{ old('company', $clients->company ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" value="{{ old('phone', $clients->phone ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email', $clients->email ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="{{ old('address', $clients->address ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="tva" class="form-label">TVA</label>
            <input type="text" class="form-control" id="tva" name="tva" placeholder="Enter TVA" value="{{ old('tva', $clients->tva ?? '') }}">
        </div>
        <button type="submit" class="button-custom">{{ $clients ? 'Update' : 'Create' }}</button>
    </form>
</div>