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
            <th>Updated At</th>
            <th>Created At</th>
            <th>Operation</th>
        </tr>
    </thead>
    <tbody>
        @if($clients->isEmpty())
        <tr>
            <th colspan="10" class="noClients">Aucun clients</th>
        </tr>
        @else
        @foreach($clients as $client)
        <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->company}}</td>
            <td>{{$client->phone}}</td>
            <td>{{$client->email}}</td>
            <td>{{$client->address}}</td>
            <td>{{$client->tva}}</td>
            <td>
                <a href="{{ route('invoice.client', $client->id) }}">
                    <i class="fas fa-folder"></i>
                </a>
            </td>
            <td>{{$client->updated_at_format}}</td>
            <td>{{$client->created_at_format}}</td>
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
        @endif
    </tbody>
</table>