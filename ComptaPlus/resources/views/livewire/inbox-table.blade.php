<div class="table-admin">
<table>
        <thead>
            <tr>
                <th>#</th>
                <th>subject</th>
                <th>sender_id</th>
                <th>receiver_id</th>
                <th>is_read</th>
                <th>created_at</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>            
            @foreach($datas as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->subject}}</td>
                <td>{{$data->sender_id}}</td>
                <td>{{$data->receiver_id}}</td>
                <td>{{$data->is_read}}</td>
                <td>{{$data->created_at}}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
 
</div>