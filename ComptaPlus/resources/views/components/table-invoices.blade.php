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
            <th>Updated At</th>
            <th>Created At</th>
            <th>Operation</th>
        </tr>
    </thead>
    <tbody>
        @if($invoices->isEmpty())
        <tr>
            <th colspan="10" class="noinvoices" >Aucun invoices</th>
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
            <td>{{$invoice->updated_at_format}}</td>
            <td>{{$invoice->created_at_format}}</td>
            <td>
                <a href="invoices/show/{{$invoice->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                    </svg>
                </a>
                <a href="/admin/invoices/edit/{{$invoice->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                    </svg>
                </a>
                <a href="/admin/invoices/delete/{{$invoice->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash2" viewBox="0 0 16 16">
                        <path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793" />
                    </svg>
                </a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>