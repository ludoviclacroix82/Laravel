<div class="clients-form">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if($clients)
        @method('PATCH')
    @endif
    <form action="{{ $clients ? route('admin.clients.update', $clients->id) : route('admin.clients.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="company" class="form-label">Company</label>
            <input type="text" class="form-control" id="company" placeholder="Enter company name" value="{{ old('company', $clients->company ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" class="form-control" id="phone" placeholder="Enter phone number">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" placeholder="Enter address">
        </div>
        <div class="mb-3">
            <label for="tva" class="form-label">TVA</label>
            <input type="text" class="form-control" id="tva" placeholder="Enter TVA">
        </div>
        <div class="mb-3">
            <label for="invoices_id" class="form-label">Invoice ID</label>
            <input type="number" class="form-control" id="invoices_id" placeholder="Enter invoice ID">
        </div>
        <button type="submit" class="button-custom">{{ $clients ? 'Update' : 'Create' }}</button>
    </form>
</div>