<div>
    <div class="tools">
        @Auth()
        <button class="button-custom">
            <a href="{{ route('admin.clients.create') }}">
                Création Clients
            </a>
        </button>
        @endAuth
    </div>
    <div class="header">
        Clients
    </div>
    <div class="container mt-5">
        <h6 class="mb-4">Filtrer</h6>
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="form-label">Company</label>
                <input type="text" class="form-control" placeholder="Entrez une company" wire:model.live="search">
            </div>
            <div class="col-md-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" placeholder="Entrez une address" wire:model.live.debounce.500ms="address">
            </div>
            <div class="col-md-3">
                <label class="form-label">email</label>
                <input type="text" class="form-control" placeholder="Entrez une email" wire:model.live.debounce.500ms="email">
            </div>
            <div class="col-md-3">
                <label class="form-label">Tva</label>
                <input type="text" class="form-control" placeholder="Entrez une tva" wire:model.live="tva">
            </div>
        </div>
        <div class="pagination">
            {{ $clients->links() }}
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Company</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>TVA</th>
                    <th>Invoice</th>
                    <th>Created At</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>

                @foreach($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->company}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->address}}</td>
                    <td>{{$client->tva}}</td>
                    <td>
                        @if($client->nbrInvoices)
                        <a href="{{ route('invoice.client', $client->id) }}">
                            <i class="fas fa-folder"></i>
                        </a>
                        @endif
                    </td>
                    <td>{{ optional($client->created_at)->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('client.show', $client->id) }}">
                            <i class="fas fa-eye"></i>
                        </a>
                        @can('update', $client)
                        <a href="{{ route('admin.clients.edit', $client->id) }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        @endcan
                        @can('delete', $client)
                        <a href="{{ route('admin.clients.delete', $client->id) }}">
                            <i class="fas fa-trash-alt" style="color: red;"></i>
                        </a>
                        @endcan
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="pagination">
            {{ $clients->links() }}
        </div>
    </div>