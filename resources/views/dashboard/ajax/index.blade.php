  {{-- <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">My Account</div>
                    <div class="card-body actions-container">
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                @if ($user->exists())
                                    <a class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.vcard.edit', $user->id) }}', 'Edit Portfolio Urls')" title="Data added"><i class="far fa-id-card"></i> Contact Details</a>
                                @else
                                    <a class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.vcard.create') }}', 'Add Portfolio Url(s)')" title="No data added"><i class="far fa-id-card"></i> Contact Details</a>
                                @endif
                            </div>
                            <div class="col-md-3">
                                @if ($user->user_bio()->exists())
                                    <a class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.bio.edit', $user->user_bio->id) }}', 'Edit Portfolio Urls')" title="Data added"><i class="fas fa-user"></i> Artist Bio</a>
                                @else
                                    <a class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.bio.create') }}', 'Add Portfolio Url(s)')" title="No data added"><i class="fas fa-user"></i> Artist Bio</a>
                                @endif
                            </div>
                            <div class="col-md-3">
                                @if ($user->user_social_url()->exists())
                                    <a class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.social.url.edit', $user->user_social_url->id) }}', 'Edit Portfolio Urls')" title="Data added"><i class="fas fa-user-friends"></i> Social Media links</a>
                                @else
                                    <a class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.social.url.create') }}', 'Add Portfolio Url(s)')" title="No data added"><i class="fas fa-user-friends"></i> Social Media links</a>
                                @endif
                            </div>
                            <div class="col-md-3">
                                @if ($user->portfolio_urls()->exists())
                                    <a class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.portfolio.url.edit', $user->id) }}', 'Edit Portfolio Urls')" title="Data added"><i class="fas fa-layer-group"></i> Links</a>
                                @else
                                    <a class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.portfolio.url.create') }}', 'Add Portfolio Url(s)')" title="No data added"><i class="fas fa-layer-group"></i> Links</a>
                                @endif
                            </div>
                            <div class="col-md-3">
                                @if ($user->cv)
                                    <a class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.cv.edit', $user->id) }}', 'Edit Portfolio Urls')" title="Data added"><i class="fas fa-file-pdf"></i> CV</a>
                                @else
                                    <a class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.cv.create') }}', 'Add Portfolio Url(s)')" title="No data added"><i class="fas fa-file-pdf"></i> CV</a>
                                @endif
                            </div>
                            <div class="col-md-3">
                                @if ($user->user_galleries()->exists())
                                    <a class="btn btn-outline-success btn-block" href="{{ route('user.gallery') }}" title="Data added"><i class="fas fa-store-alt"></i> Gallery representation</a>
                                @else
                                    <a class="btn btn-outline-danger btn-block" href="{{ route('user.gallery') }}" title="No data added"><i class="fas fa-store-alt"></i> Gallery representation</a>
                                @endif
                            </div>
                           <div class="col-md-3">
                                    <a class="btn btn-outline-danger btn-block" href="{{ route('user.about') }}" title="No data added"><i class="fas fa-store-alt"></i> About me</a>
                            </div>                            

                            <div class="col-md-3">
                               
                                    <a class="btn btn-outline-success btn-block" href="{{ route('user.exhibition') }}" title="Data added"><i class="fas fa-store-alt"></i>Edit/Add Exhibitions</a>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

  {{-- <div class="row step-panel">
            <div class="col">
                  <ul class="navbar-nav ml-auto ">
                        <!-- Authentication Links -->
                        @guest

                        @else
                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Welcome, {{ Auth::user()->first_name }}!
                                </a>

                                <div class="dropdown" style="    top: -45px;left: 7px;" >
                                    <div class="dropdown-menu active-btn" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"  href="{{route('user.about')}}">My Account</a>
                                        <a class="dropdown-item"  target="_blank" href="{{route('user.me', Auth::user()->slug)}}">View Live Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </div>
                                </div>

                               

                            </li>
                        @endguest
                    </ul>
            </div>
            <div class="col">
                sad
                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://www.brush.bio/saleem1234&choe=UTF-8" />

                <div id="qrcode"></div>
            </div>
            
        </div> --}}
       <div class="row">
     <div class="columns">
         <div class="circle">
       <!-- User Profile Image -->
       <img width="300" height="300" style="background-repeat: no-repeat; object-fit: cover;" class="profile-pic1" src="{{asset('user_profile_pics/'.$user->profile_pic)}}">
       <!-- <i class="fa fa-user fa-5x"></i> -->
     </div>
     <div class="p-image" style="margin-inline: 58px;">
        <form id="profile_image_form" action="{{route('user.update.profile.image')}}" method="POST" enctype="multipart/form-data">
            @csrf
       <i class="fa fa-camera upload-button"></i>
        <input class="file-upload" id="profile_image" name="img" type="file" accept="image/"/>
        </form>
     </div> 
     </div>

</div>

        <div class="row">
            <h1 class="manage-profile">Manage your profile</h1>
        </div>

        <div class="row">
                         @if ($user->exists())
                                    <a class="btn btn-primary col-lg-5 col-md-6 col-xs-12 btn-block  m-2 mx-4 p-3 active-btn" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.vcard.edit', $user->id) }}', 'Edit Portfolio Urls')" title="Data added">Edit About me</a>

                                @else
                                    <a class="btn cutome-border col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.vcard.create') }}', 'Add Portfolio Url(s)')" title="No data added"><i class="fa fa-plus"></i>Add About me</a>
                                @endif
                        
        </div>
            <div class="row">
                               @if ($user->user_social_url()->exists())
                                    <a class="btn btn-primary  btn-block col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3 active-btn" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.social.url.edit', $user->user_social_url->id) }}', 'Edit Portfolio Urls')" title="Data added"> Edit Social Media links</a>
                                @else
                                    <a class="btn cutome-border col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.social.url.create') }}', 'Add Portfolio Url(s)')" title="No data added"><i class="fa fa-plus"></i> Social Media links</a>
                                @endif
            
        </div>
            <div class="row">
                                @if ($user->portfolio_urls()->exists())
                                    <a class="btn btn-primary  btn-block col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3 active-btn" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.portfolio.url.edit', $user->id) }}', 'Edit Portfolio Urls')" title="Data added"> Edit Links</a>
                                @else
                                    <a class="btn cutome-border col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" data-toggle="modal" data-target="#mainModal" href="javascript:void(0)" onclick="javascript:editModal('{{ route('user.portfolio.url.create') }}', 'Add Portfolio Url(s)')" title="No data added"><i class="fa fa-plus"></i>Add Links</a>
                                @endif
            
        </div>
    
        <div class="row">
                               @if ($user->user_galleries()->exists())
                                    <a class="btn btn-primary  btn-block col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3 active-btn" href="{{ route('user.gallery') }}" title="Data added"> Edit Gallery representation</a>
                                @else
                                    <a class="btn cutome-border col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" href="{{ route('user.gallery') }}" title="No data added"><i class="fa fa-plus"></i> Add Gallery representation</a>
                                @endif
        </div>
        
         <div class="row">
                          @if ($user->user_exhibitions()->exists())
                               <a class="btn btn-primary  btn-block col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3 active-btn" href="{{ route('user.exhibition') }}" title="Data added"> Edit Exhibitions</a>
                                    @else
                                      <a class="btn cutome-border col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" href="{{ route('user.exhibition') }}" title="No data added"><i class="fa fa-plus"></i>Add Exhibitions</a>

                                    @endif
                          
            
        </div>
        <div class="row">
             <a class="btn col-lg-5 col-md-6 col-xs-12 m-2 mx-4 p-3" href="{{route('user.mailable')}}" title="No data added"></i>Manage Mailable</a>
            
        </div>
               <!--  <div class="row" >
                 <button type="button" class="btn btn-primary btn-lg btn-block w-25 m-1 active-btn">Block level button</button>       
        </div>
                <div class="row"  >
                 <button type="button" class="btn cutome-border w-25 m-1">Block level button</button>       
        </div> -->
      
      
      
      