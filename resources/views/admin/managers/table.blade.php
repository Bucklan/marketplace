<table class="table" id="dataTable">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
        <th scope="col">Edit</th>
    </tr>
    </thead>
    <tbody>
    @forelse($managers as $manager)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $manager->name }}</td>
            <td>{{ $manager->email }}</td>
            <td>
                @if(!$manager->login_blocked_at)
                    @include('admin.managers.button-block')
                @else
                    @include('admin.managers.button-unblock')
                @endif
            </td>
            <td>
                <a href="{{ route('admin.managers.edit', $manager->id) }}" class="btn btn-success">Edit</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">No managers found.</td>
        </tr>
    @endforelse
    </tbody>
</table>
