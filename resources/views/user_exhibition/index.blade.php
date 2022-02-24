@extends('layouts.app')
@section('content')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">Manage exhibitions                      
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ url()->previous() }}" title="Go back"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                    {{-- <input type="hidden" name="type" value="{{$type}}" id="exhibitionType"> --}}
                    <div class="card-body">
                        <div class="row">
                                                       
                            <div class="col-md-12 mb-3">
                            <div class="float-left">
                             <form  id="search_user_exhibition" action="{{route('user.exhibition.search')}}" method="get">
                              <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control mb-2 mr-sm-2" placeholder="Start date"  name="s_start_date" required>
                                </div>
                                <div class="form-group col-md-5">
                                    <label>End Date</label>
                                     <input type="date" class="form-control mb-2 mr-sm-2" placeholder="End date"  name="s_end_date" required>
                                </div>
                                  <div class="form-group col-md-2" style="margin-top: 30px;">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                      
                                  </div>
                              </div>
                              </form> 
                                </div>                                   
                                <div class="float-right">
                                    <a class="btn btn-info" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.exhibition.create') }}', 'Add Portfolio Url(s)')" title="No data added"><i class="fas fa-plus-square"></i> Add new exhibition</a>
                                </div>
                            </div>
                        </div>
                        <div class="tblExhibitionList table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <!--<th scope="col">#</th>-->
                                        <th scope="col"></th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Gallery Name</th>
                                        <!--<th scope="col">Address</th>-->
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <!--<th scope="col">Website</th>-->
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user_exhibitions as $user_exhibition)
                                        <tr>
                                            <!--<td>{{ $user_exhibition->id }}</td>-->
                                            <td>
                                                <a class="btn btn-info" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.exhibition.edit', $user_exhibition->id) }}', 'Add Portfolio Url(s)')" title="Edit"><i class="fas fa-edit"></i> </a>
                                            </td>
                                        <td>{{ $user_exhibition->exhibition_name }}</td>
                                        <td>{{ $user_exhibition->gallery_name }}</td>
                                        <!--<td>{{ $user_exhibition->address }}</td>-->
                                        <td>{{ $user_exhibition->start_date }}</td>
                                        <td>{{ $user_exhibition->end_date }}</td>
                                        <!--<td>{{ $user_exhibition->website }}</td>-->
                                        
                                        <td>
                                            <form action="{{ route('user.exhibition.delete', $user_exhibition->id) }}" class="frmDelete" id="exhibition">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
