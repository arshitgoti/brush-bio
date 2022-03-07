<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Dashboard |<?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/lobibox.min.css')); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?php echo e(asset('css/select2.min.css')); ?>" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
      />
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" defer></script>
     <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery.ui.widget@1.10.3/jquery.ui.widget.js"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/jquery.ui.mouse.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script> -->

  <style type="text/css">
      @media  screen and (max-width: 480px) {
  #navbarDropdown {
    margin-left: -75px;
  }
}
  @media  screen and (max-width: 480px) {
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
            <?php if(Auth::check() && Auth::user()->hasVerifiedEmail()): ?>


            <?php elseif(Auth::check()): ?>

                        <div class="verification-alert alert-danger text-center"> Email verification pending. To request another verification link
                            <form class="d-inline" method="POST" action="<?php echo e(route('verification.resend')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline"><?php echo e(__('Click here')); ?></button>
                            </form>
                        </div>
            <?php endif; ?>
         <?php if(auth()->guard()->check()): ?>
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(route('user.dashboard')); ?>">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Artistic Closeup" srcset=" ">
                </a>
                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Welcome, <?php echo e(Auth::user()->first_name); ?>!
                                </a>

                                <div class="dropdown" style=" left: -141px; top: 8px;">
                                    <div class="dropdown-menu active-btn" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo e(route('user.about')); ?>">My Account</a>
                                        <a class="dropdown-item"  target="_blank" href="<?php echo e(route('user.me', Auth::user()->slug)); ?>">View Live Profile</a>
                                        <!--<a class="dropdown-item"  target="_blank" href="#">Insights</a>-->
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                    </div>
                                </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <?php endif; ?>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>

                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <div class="nav-link">
                                    <b>My Link:</b> <a target="_blank" id="mylink" href="<?php echo e(route('user.me', Auth::user()->slug)); ?>">brush.bio/<?php echo e(Auth::user()->slug); ?></a>
                                        <!-- <?php echo e(route('user.me', Auth::user()->slug)); ?>-->

                                    <img src="<?php echo e(asset('/images/copy.png')); ?>" onclick="ShareFunction()" width="30" height="30" style="cursor:pointer;" />
                                    
                                    <a role="button" data-toggle="modal" data-target="#exampleModalCenter">
                                        <img class="user-qr-code" src="https://chart.googleapis.com/chart?chs=50x50&cht=qr&chl=<?php echo e(route('user.me', Auth::user()->slug)); ?>&choe=UTF-8&chf=bg,s,F8FAFC" />
                                    </a>
                                </div>

                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>



        <main class="py-4">


            <?php echo $__env->yieldContent('content'); ?>
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
<?php if(Auth::user()): ?>
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
           <img class="user-qr-code" src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=<?php echo e(route('user.me', Auth::user()->slug)); ?>&choe=UTF-8" />
       </div>
      </div>
      <div class="modal-footer">
        <a type="button" href="<?php echo e(route('image.download')); ?>" class="btn btn-primary imagedownload"><i class="fas fa-download"></i> Download</a>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
    <?php echo $__env->make('includes.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('includes.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.min.js')); ?>" ></script>

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
                        url:'<?php echo e(route('user.gallery.position')); ?>',
                        data:{sortData:sortData},
                        success:function(res){
                            // alert('success');

                        }
                    });
                }
            });
        });
    </script>

    <script src="<?php echo e(asset('js/qr.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lobibox.js')); ?>"></script>
    <script>
        var APP_URL = "<?php echo e(config('app.url')); ?>";
    </script>

    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
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




<?php /**PATH D:\XAMPP\htdocs\brush-bio\resources\views/layouts/app.blade.php ENDPATH**/ ?>