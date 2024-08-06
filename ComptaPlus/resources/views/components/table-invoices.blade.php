<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Ref</th>
            <th>Title</th>
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
        @if($invoices->isEmpty())
        <tr>
            <th colspan="10" class="noinvoices">Aucun invoices</th>
        </tr>
        @else
        @foreach($invoices as $invoice)
        <tr>
            <td>{{$invoice->id}}</td>
            <td>{{$invoice->ref}}</td>
            <td>{{$invoice->title}}</td>
            <td>{{$invoice->price}}</td>
            <td>{{$invoice->tva}}</td>
            <!-- <td>{{number_Format($invoice->price + ($invoice->price * ($invoice->tva/100)),2)}}</td> -->
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
                    <i class="fas fa-eye"></i>
                </a>
                @can('update', $invoice)
                <a href="{{ route('admin.invoices.edit', $invoice->id) }}">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                @endcan
                @can('delete', $invoice)
                <a href="{{ route('admin.invoices.delete', $invoice->id) }}">
                    <i class="fas fa-trash-alt" style="color: red;"></i>
                </a>
                @endcan
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>