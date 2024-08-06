<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>role</th>
            <th>Updated At</th>
            <th>Created At</th>
            <th>Operation</th>
        </tr>
    </thead>
    <tbody>
        @if($users->isEmpty())
        <tr>
            <th colspan="10" class="noClients">Aucun User</th>
        </tr>
        @else
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->updated_at_format}}</td>
            <td>{{$user->created_at_format}}</td>
            <td>
                <a href="{{route('admin.users.show',$user->id)}}">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <a href="">
                    <i class="fas fa-trash-alt" style="color: red;"></i>
                </a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>