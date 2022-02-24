<table class="table table-hover table-bordered" cellpadding="0" cellspacing="0" border="1">
    <thead>
        <tr>
            <!--<th scope="col">#</th>-->
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Postal Code</th>
            <th scope="col">City, Country</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Website</th>
            <th scope="col">Instagram</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($user_galleries as $user_gallery)
            <tr>
                <!--<td>{{ $user_gallery->id }}</td>-->
                <td><i class="fas fa-arrows-alt"></i><br>{{ $user_gallery->name }}</td>
                <td>{{ $user_gallery->address }}</td>
                <td>{{ $user_gallery->postal_code }}</td>
                <td>{{ $user_gallery->city }} {{ $user_gallery->country }}</td>
                <td>{{ $user_gallery->email }}</td>
                <td>{{ $user_gallery->phone }}</td>
                <td>{{ $user_gallery->website }}</td>
                <td>{{ $user_gallery->instagram }}</td>
                <td style="display: none;">{{$user_gallery->id}}</td>

                <td>
                    <a class="btn btn-info" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.gallery.edit', $user_gallery->id) }}', 'Add Portfolio Url(s)')" title="Edit"><i class="fas fa-edit"></i> </a>

                    <form action="{{ route('user.gallery.delete', $user_gallery->id) }}" class="frmDelete">
                        <button class="btn btn-danger" type="submit" ><i class="fas fa-trash"></i></button>
                     </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10" align="center">No Gallery Found</td>
            </tr>
        @endforelse
    </tbody>
</table>


