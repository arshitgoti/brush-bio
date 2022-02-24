@extends('layouts.app')
 
@section('content')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      Manage Mailing List
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ url()->previous() }}" title="Go back"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <form class="form-group" action="{{route('save.setting')}}" method="get"> 
                                    <div class="row  align-items-center justify-content-around">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Cookie Days</label>
                                                <input type="number" name="is_cookies" class="form-control" value="{{$setting->is_cookies}}">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-check form-check-inline">
                                                
                                                <input type="checkbox" name="is_mail" class="form-check-input"  @if($setting->is_mail==1) checked @endif>
                                                <label class="form-check-label">Show mailing list pop-up to people who visit my profile</label>
                                                
                                            </div>
                                            <div class="form-check form-check-inline">
                                                
                                                <input type="checkbox" name="is_subscribe_mail" class="form-check-input" @if($setting->is_subscribe_mail==1) checked @endif>
                                                <label class="form-check-label">Notify me of new subscribers</label>
                                                
                                            </div>
                                            <div class="form-check form-check-inline">
                                                
                                                <input type="checkbox" name="is_weekly_mail" class="form-check-input"  @if($setting->is_weekly_mail==1) checked @endif>
                                                <label class="form-check-label">Weekly summary of subscribers</label>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-right mt-1">
                                    
                                    <button type="submit" class="btn btn-info" href="{{route('user.import.mailable')}}"  title="No data added">Save changes</button>
                                
                                            
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <!--<div class="card-header">
                        Manage Mailinglist
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ url()->previous() }}" title="Go back"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </div>-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="float-left">
                                    <button class="btn btn-info"   title="No data added" onclick="document.getElementById('importselected').submit();"><i class="fas fa-download"></i> Export Selected</button>
                                </div>
                                <div class="float-right">
                                    <a class="btn btn-info" href="{{route('user.import.mailable')}}"  title="No data added"><i class="fas fa-download"></i> Export All</a>
                                </div>
                            </div>
                        </div>
                        <div class="tblGalleryList table-responsive" >
                            <table class="table table-hover table-bordered" cellpadding="0" cellspacing="0" border="1">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Date added</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                   <form action="{{route('user.import.selected')}}" method="get" id="importselected">
                                    @forelse($user->viewprofile as $key=>$profile)
                                        <tr>
                                                <td><input type="checkbox" name="rowid[]" value="{{$profile->id}}"></td>
                                            
                                            <td>{{$key+1}}</td>
                                            <td>{{ $profile->email }}</td>
                                            <td>{{ date('m-d-Y', strtotime($profile->created_at)) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" align="center">No Subscriber Found</td>
                                        </tr>
                                    @endforelse
                                    </form>
                                </tbody>
                            </table>
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


