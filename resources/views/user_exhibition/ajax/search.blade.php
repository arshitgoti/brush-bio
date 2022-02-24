<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <!--<th scope="col">#</th>-->
            <th scope="col">Name</th>
            <th scope="col">Gallery Name</th>
            <th scope="col">Address</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Website</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($user_exhibitions as $user_exhibition)
            <tr>
                <!--<td>{{ $user_exhibition->id }}</td>-->
                <td>{{ $user_exhibition->exhibition_name }}</td>
                <td>{{ $user_exhibition->gallery_name }}</td>
                <td>{{ $user_exhibition->address }}</td>
                <td>{{ $user_exhibition->start_date }}</td>
                <td>{{ $user_exhibition->end_date }}</td>
                <td>{{ $user_exhibition->website }}</td>
                <td>
                    <a class="btn btn-info" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.exhibition.edit', $user_exhibition->id) }}', 'Add Portfolio Url(s)')" title="Edit"><i class="fas fa-edit"></i> </a>

                    <form action="{{ route('user.exhibition.delete', $user_exhibition->id) }}" class="frmDelete">
                       <button class="btn btn-danger" type="submit" ><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" align="center">No Exhibition Found</td>
            </tr>
        @endforelse
    </tbody>
</table>
