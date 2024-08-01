<div class="form">
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

    @if($invoices)
    <div class="header">
        Modifier Facture : &nbsp;  <strong> {{$invoices->ref}}</strong>
    </div>
    @else
    <div class="header">
        Création Invoices
    </div>
    @endif

    <form action="{{ $invoices ? route('admin.invoices.update', $invoices->id) : route('admin.invoices.store') }}" method="post">
        @csrf 
        @if($invoices)
            @method('patch')
            <input type="hidden" class="form-control" id="ref" name="ref" placeholder="Enter ref" value="{{ old('ref', $invoices->ref ?? '') }}" disabled>
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ old('title', $invoices->title ?? '') }}">
        </div>        
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" value="{{ old('price', $invoices->price ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="tva" class="form-label">TVA</label>
            <input type="number" class="form-control" id="tva" name="tva" placeholder="Enter TVA" value="{{ old('tva', $invoices->tva ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="client_id" class="form-label">Client</label>
            <input type="number" class="form-control" id="client_id" name="client_id" placeholder="Enter client" value="{{ old('client_id', $invoices->client_id ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control form-textarea" cols="30" rows="5" id="description" name="description" placeholder="Enter description" id="">{{ old('description', $invoices->description ?? '') }}</textarea>
        </div>
        <button type="submit" class="button-custom">{{ $invoices ? 'Update' : 'Create' }}</button>
    </form>
</div>