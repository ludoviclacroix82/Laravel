<div class="table-admin">
    <table>
        <thead>
            <tr>
                <th>subject</th>
                <th>receiver</th>
                <th>is_read</th>
                <th>created_at</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
            <tr>
                <td>{{$data->subject}}</td>
                <td>{{$data->user}}</td>
                <td>{{$data->is_read}}</td>
                <td>{{$data->created_at}}</td>
                <td>
                    <a href="{{route('admin.inbox.view',$data->id)}}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$datas->links()}}
</div>