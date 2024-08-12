<div>
    <div class="tools">
        @Auth()
        <button class="button-custom">
            <a href="{{route('admin.invoices.create')}}">
                Création invoices
            </a>
        </button>
        @endauth
    </div>
    <div class="header">
        Invoices
    </div>
    <h6 class="mb-4">Filtrer</h6>
    <div class="row mb-3">
        <div class="col-md-3">
            <label class="form-label">Ref</label>
            <input type="text" class="form-control" placeholder="Entrez une ref" wire:model.live="ref">
        </div>
        <div class="col-md-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" placeholder="Entrez une Title" wire:model.live="title">
        </div>
        <div class="col-md-3">
            <label class="form-label">Client</label>
            <input type="text" class="form-control" placeholder="Entrez une client"  wire:model.live.debounce.500ms="client" >
        </div>
        <div class="col-md-3">
            <label class="form-label">Author</label>
            <input type="text" class="form-control" placeholder="Entrez une author" wire:model.live.debounce.500ms="author">
        </div>
    </div>
    <div class="pagination">
        {{ $invoices->links() }}
    </div>
    <table>
        <thead>

                <th>#</th>
                <x-table-header :direction="$orderDirection" :name="'Ref'" :field="$orderField">Ref</x-invoices-table-header>
                <x-table-header :direction="$orderDirection" :name="'title'" :field="$orderField">Title</x-invoices-table-header>
                <th>Price HT</th>
                <th>Tva</th>
                <th>Price TTC</th>
                <th>Client</th>
                <th>Author</th>
                <th>Updated At</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
            <tr>
                <td>{{$invoice->id}}</td>
                <td>{{$invoice->ref}}</td>
                <td>{{$invoice->title}}</td>
                <td>{{$invoice->price}}</td>
                <td>{{$invoice->tva}}</td>
                <td>{{$invoice->priceTTC}}</td>
                <td>
                    <a href="/clients/show/{{$invoice->client_id}}">
                        {{$invoice->company}}
                    </a>
                </td>
                <td>{{$invoice->author}}</td>
                <td>{{$invoice->created_at_format}}</td>
                <td>
                    <a href="{{ route('invoice.show', $invoice->id) }}">
                        <i class="fas fa-eye" title='View'></i>
                    </a>
                    @can('update', $invoice)
                    <a href="{{ route('admin.invoices.edit', $invoice->id) }}">
                        <i class="fas fa-pencil-alt" title='Edit'></i>
                    </a>                       
                    @endcan
                    @if($invoice->to_conclude === 0) 
                        <a href="{{ route('admin.invoices.unclosed', $invoice->id) }}">
                            <i class="fas fa-unlock" title='unclosed'></i>
                        </a>
                        @else
                            <i class="fas fa-lock" title='Contact the administrator to reopen the invoices.'></i>
                        @endif
                    @can('delete', $invoice)
                    <a href="{{ route('admin.invoices.delete', $invoice->id) }}">
                        <i class="fas fa-trash-alt" style="color: red;" title="Delete"></i>
                    </a>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{ $invoices->links() }}
    </div>
</div>