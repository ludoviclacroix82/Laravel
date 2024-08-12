<div class="form">
    <div class="tools-links">
        <a href="{{URL::previous()}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
            </svg>
            Retour Invoices
        </a>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger alert-static">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if($invoices)
    <div class="header">
        Modifier Facture : &nbsp; <strong> {{$invoices->ref}}</strong>
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
        @can('update',$invoices)
        <div class="col d-flex justify-content-end">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="to_conclude" name="to_conclude"  {{ $invoices->to_conclude ? 'checked' : '' }}>
            <label class="form-check-label" for="to_conclude">
                To Conclude
            </label>
        </div>
        </div>
        @endcan
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ old('title', $invoices->title ?? '') }}">
        </div>
        @can('updateAuthor',$invoices)
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <select class="form-select" id="author_id" name="author_id">
                <option disabled selected value="">Choisissez user</option>
                @foreach ($usersAll as $user)
                {{$user->id}}
                @if(intval(old('author_id', $invoices->author_id ?? '')) === intval($user->id) )
                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                @else
                <option value="{{ $user->id }}">{{ $user->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
        @endcan
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
            <select class="form-select" id="client_id" name="client_id">
                <option disabled selected value="">Choisissez Client</option>
                @foreach ($clientsAll as $client)
                {{$client->id}}
                @if(intval(old('client_id', $invoices->client_id ?? '')) === intval($client->id) )
                <option value="{{ $client->id }}" selected>{{ $client->company }}</option>
                @else
                <option value="{{ $client->id }}">{{ $client->company }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control form-textarea" cols="30" rows="5" id="description" name="description" placeholder="Enter description" id="">{{ old('description', $invoices->description ?? '') }}</textarea>
        </div>
        <button type="submit" class="button-custom">{{ $invoices ? 'Update' : 'Create' }}</button>
    </form>
</div>