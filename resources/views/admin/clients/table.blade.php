<table
    class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$client->name}}</td>
            <td>{{$client->email}}</td>
            <td>
                @if($client->login_blocked_at == null)
                    @include('admin.clients.button-block')
                @else
                    @include('admin.clients.button-unblock')
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
