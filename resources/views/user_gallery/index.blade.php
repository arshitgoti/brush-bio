@extends('layouts.app')
 
@section('content')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Manage Galleries
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ url()->previous() }}" title="Go back"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="float-right">
                                    <a class="btn btn-info" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.gallery.create') }}', 'Add Portfolio Url(s)')" title="No data added"><i class="fas fa-plus-square"></i> Add New Gallery</a>
                                </div>
                            </div>
                        </div>
                        <div class="tblGalleryList table-responsive" >
                            <table class="table table-hover table-bordered" cellpadding="0" cellspacing="0" border="1">
                                <thead>
                                    <tr>
                                        <!--<th scope="col">#</th>-->
                                        <th scope="col"></th>
                                        <th scope="col">Gallery Name</th>
                                        <!--<th scope="col">Address</th>
                                        <th scope="col">Postal Code</th>
                                        <th scope="col">City, Country</th>-->
                                        <th scope="col">Email</th>
                                        <!--<th scope="col">Phone</th>-->
                                        <th scope="col">Website</th>
                                        <th scope="col">Instagram</th>
                                        <th scope="col"></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @forelse ($user_galleries as $key=>$user_gallery)
                                    
                                        <tr id="sortable">
                                            <!--<td>{{ $user_gallery->id }}</td>-->
                                        <td>
                                            <a class="btn btn-info" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.gallery.edit', $user_gallery->id) }}', 'Add Portfolio Url(s)')" title="Edit"><i class="fas fa-edit"></i> </a>
                                        </td>
                                        
                                        <td><!--<i class="fas fa-arrows-alt"></i><br>-->
                                        {{ $user_gallery->name }}</td>
                                        <!--<td>{{ $user_gallery->address }}</td>
                                        <td>{{ $user_gallery->postal_code }}</td>
                                        <td>{{ $user_gallery->city }} {{ $user_gallery->country }}</td>-->
                                        <td>{{ $user_gallery->email }}</td>
                                        <!--<td>{{ $user_gallery->phone }}</td>-->
                                        <td>{{ $user_gallery->website }}</td>
                                        <td>{{ $user_gallery->instagram }}</td>
                                        <td style="display: none;">{{$user_gallery->id}}</td>

                                        <td>
                                            <form action="{{ route('user.gallery.delete', $user_gallery->id) }}" class="frmDelete" id="gallery">
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
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


