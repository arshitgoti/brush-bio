<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard |{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lobibox.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
      />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
<!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" defer></script>
     <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery.ui.widget@1.10.3/jquery.ui.widget.js"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/jquery.ui.mouse.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script> -->
    
  <style type="text/css">
      @media screen and (max-width: 480px) {
  #navbarDropdown {
    margin-left: -75px;
  }
}
  @media screen and (max-width: 480px) {
  .dropdown-menu{

    margin-left: -55px;

  }
}
.highlight {
    background: #b3b3b3;
}
  </style>

</head>
<body>
    <div id="app">
            @if(Auth::check() && Auth::user()->hasVerifiedEmail())
            
                
            @elseif(Auth::check())
               
                        <div class="verification-alert alert-danger text-center"> Email verification pending. To request 
another verification link  
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Click here') }}</button>
                            </form>                            
                        </div>
            @endif
         @auth
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('user.dashboard') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Artistic Closeup" srcset=" ">
                </a>
                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Welcome, {{ Auth::user()->first_name }}!
                                </a>

                                <div class="dropdown" style=" left: -141px; top: 8px;">
                                    <div class="dropdown-menu active-btn" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{route('user.about')}}">My Account</a>
                                        <a class="dropdown-item"  target="_blank" href="{{route('user.me', Auth::user()->slug)}}">View Live Profile</a>
                                        <!--<a class="dropdown-item"  target="_blank" href="#">Insights</a>-->
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
                
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                @endauth

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                        @else
                            <li class="nav-item dropdown">
                                <div class="nav-link">
                                    <b>My Link:</b> <a target="_blank" id="mylink" href="{{route('user.me', Auth::user()->slug)}}">brush.bio/{{Auth::user()->slug}}</a>
                                        <!-- {{route('user.me', Auth::user()->slug)}}-->
                                        
                                    <img src="{{asset('/images/copy.png')}}" onclick="ShareFunction()" width="30" height="30" style="cursor:pointer;" />
                                    {{-- target="_blank" href="https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl={{route('user.me', Auth::user()->slug)}}&choe=UTF-8" --}}
                                    <a role="button" data-toggle="modal" data-target="#exampleModalCenter">
                                        <img class="user-qr-code" src="https://chart.googleapis.com/chart?chs=50x50&cht=qr&chl={{route('user.me', Auth::user()->slug)}}&choe=UTF-8&chf=bg,s,F8FAFC" />
                                    </a>
                                </div>

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
			
		
		
        <main class="py-4">
		

            @yield('content')
        </main>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="mainModal" tabindex="-1" role="dialog" aria-labelledby="mainModalLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
<!-- Modal -->
@if(Auth::user())
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Download QR Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row justify-content-center">
           <img class="user-qr-code" src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl={{route('user.me', Auth::user()->slug)}}&choe=UTF-8" />
       </div>
      </div>
      <div class="modal-footer">
        <a type="button" href="{{route('image.download')}}" class="btn btn-primary imagedownload"><i class="fas fa-download"></i> Download</a>
      </div>
    </div>
  </div>
</div>
@endif
    @include('includes.loader')
    @include('includes.flash')
    <!-- <div class="modal-body" >
      
        <p class="text-muted">Add links to your portfolio, interviews, news articles or press releases, etc. Be creative. What do you want your potential buyers to see?
            </p>
        <label for="user-website" class="col-form-label">Your Links:</label>
        <div class="url_container"  id="linksort">
          <ul id="sortable" class="url_container1 sortable" style="list-style-type:none;">
           <li style="z-index: 99999 !important;" >
            <input type="hidden" name="portfolio_url[position][]" id="position">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-arrows-alt"></i></span>                                   
                                </div>
                                <input type="text" class="form-control" placeholder="Enter Title" aria-label="Enter Url" aria-describedby="basic-addon2" name="portfolio_url[title][]" maxlength="35" required>
                                <input type="text" class="form-control" placeholder="yourwebsite.com" aria-label="Enter Url" aria-describedby="basic-addon2" name="portfolio_url[url][]" required>
                                <div class="input-group-append">
                                <button class="btn btn-danger removePortfolioUrl" type="button"><i class="fas fa-trash"></i></button>
                                
                            </div>
                            </div>
                             
                        </div>
                        
                    </div>
                   {{-- <i class="fas fa-arrows-alt"></i>
                    <div class="input-group mb-3">
                        <div class="link-title-instruction">Title : </div>
                        <input type="text" class="form-control" placeholder="Enter Title" aria-label="Enter Url" aria-describedby="basic-addon2" name="portfolio_url[title][]" maxlength="35" required>
                        <span class="error_input portfolio_url_error text-danger"></span>
                    </div>
                    <div class="input-group mb-3">
                        <div class="link-website-instruction">https://www.</div>
                        <input type="text" class="form-control" placeholder="yourwebsite.com" aria-label="Enter Url" aria-describedby="basic-addon2" name="portfolio_url[url][]" required>
                        <span class="error_input portfolio_url_error text-danger"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            <button class="btn btn-danger float-right removePortfolioUrl" type="button"><i class="fas fa-trash"></i> Remove Item</button>
                        </div>
                    </div> --}}
                </div>
            </div>
          </li>
          </ul>
        </div>
        
       
        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    <a href="javascript:void(0)" class="addPortfolioUrl"><i class="fas fa-plus"></i> Add Link</a>
                </div>
            </div>
        </div>
    </div> -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}" ></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script> --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
<script src="https://rawgit.com/RubaXa/Sortable/master/Sortable.js"></script>


<!-- <script src="https://raw.github.com/furf/jquery-ui-touch-punch/master/jquery.ui.touch-punch.min.js"></script>  -->
   


    <script type="text/javascript">

        $(function () {
            // new Sortable(document.getElementsByClassName('')[0]);
            // var el = document.getElementById('sortable');
            // var sortable = Sortable.create(el);
        Sortable.create(sortable, {
                        swap: true, // Enable swap plugin
                        swapClass: 'highlight', // The class applied to the hovered swap item
                        animation: 150

         /* options */ });
                $("li").each(function (index) {
                     // alert(index);
                     $(this).find("#liposition").val(index);
                        
                    });
                // $("#sortable").sortable({
                //   cursor: 'move',
                // axis: 'y',
                // dropOnEmpty: false,
               
                // start: function (e, ui) {
                //     ui.item.addClass("selected");
                // },
                // stop: function (e, ui) {
                //     ui.item.removeClass("selected");
                //     $(this).find("li").each(function (index) {

                //     $(this).find("#position").val(index);
                        
                //     });
     
                // }

                // });
            // const sortData=[];
            $("#gallery_table").sortable({
                items: 'tr:not(tr:first)',
                cursor: 'pointer',
                axis: 'y',
                dropOnEmpty: false,
                start: function (e, ui) {
                    ui.item.addClass("selected");
                },
                stop: function (e, ui) {
                    ui.item.removeClass("selected");
                    $(this).find("tr").each(function (index) {
                        if(index>0){
                            sortData[index-1]=$(this).find("td").eq(8).html();
                        }
                    });
                    $.ajax({
                        type:'GET',
                        url:'{{route('user.gallery.position')}}',
                        data:{sortData:sortData},
                        success:function(res){
                            // alert('success');

                        }
                    });
                }
            });    
        });
    </script>
    
    <script src="{{ asset('js/qr.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/lobibox.js') }}"></script>
    <script>
        var APP_URL = "{{config('app.url')}}";
    </script>

    <script src="{{ asset('js/custom.js') }}"></script>
       <script>
    function ShareFunction() {
      /* Get the text field */
      var copyText = document.getElementById("mylink").innerHTML;

      /* Select the text field */

      /* Copy the text inside the text field */
      navigator.clipboard.writeText(copyText);
      
      /* Alert the copied text */
      alert("Link Copied: " + copyText);
    }
   </script>




