<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyword" content="سؤال وجواب,مسابقات,اربح ايفون,اربح فلوس ,كاش">
    <meta name="description" content=" مسابقات وجوائز أو جهاز أيفون أو مبلغ كاش فوري يصلك حيثما كنت حول العالم ">
    <meta name="author" content="داني تيوب">
    <meta name="generator" content="Hugo 0.84.0">
    <title> {{ $allsettings->sitename }} </title>
	  <link rel="stylesheet" href="https://getbootstrap.com/docs/5.0/examples/checkout-rtl/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbars/">
	   
    <!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" >
    
  <link rel="shortcut icon" href="./style/images/card.png" type="image/x-icon">
	<link type="text/css" rel="stylesheet" href="./style/css/headers.css">
	<link type="text/css" rel="stylesheet" href="./style/css/blog.rtl.css">
	<link type="text/css" rel="stylesheet" href="./style/css/offcanvas.css">
	<link type="text/css" rel="stylesheet" href="./style/css/bglukyno.css">
	<link type="text/css" rel="stylesheet" href="./style/css/navbar.css">

	 
    <style>
	 body{font-family: 'Droid Arabic Kufi' !important;}
	 .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
	  .center {
	  display: block;
	  margin-left: auto;
	  margin-right: auto;
	  width: 100%;
}
.bg-primary {
    background-color: #212529!important;
}

    </style>
 @include('layouts.style.googleadscode')
  </head>
  <body style="padding-top:-45px; margin-top:-40px;">
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 themed-grid-col">
                <div class="nav-scroller">
                  
              <nav class=" navbar-expand navbar-light" aria-label="" style="float:right; padding-top:3px;">
                <div class="container-fluid">
                  <div class="collapse navbar-collapse" id="navbarsExample02">
                    <ul class="navbar-nav me-auto" style="padding-left:87px;">
                     
                    @if (Route::has('login'))
                         @auth
                         <li class="nav-item" style="margin-right:-20px;"> <a class="nav-link" href="{{ route('profile.show') }}"> {{ __('app.My Page') }} |</a></li>
                         <!-- Authentication -->
                         <li class="nav-item"><form class="nav-link" method="POST" action="{{ route('logout') }}" style="margin-right:-10px;" x-data>
                              @csrf
                              <x-jet-dropdown-link class="nav-link" style="margin-right:-20px; margin-top:-8px;" href="{{ route('logout') }}"
                                @click.prevent="$root.submit();"> {{ __('app.Out') }} </x-jet-dropdown-link>
                          </form> </li>
                         @else
                         <li class="nav-item" style="margin-right:-20px;"><a class="nav-link" href="{{ route('register') }}"> {{ __('app.Register') }} |</a></li>
                         <li class="nav-item"><a class="nav-link" href="{{ route('login') }}" style="margin-right:-10px;"> {{ __('app.Log in') }} </a></li>
                         @endif
                         @endauth
                     
                    </ul>
                  </div>
                </div>
              </nav>
                <nav class="nav nav-underline" aria-label="Secondary navigation" style="direction:rtl; text-align:left;" >
                  <a style=" font-size:12px;float:left; margin: 3px 0 0 -22px;" class="nav-link" title="الاحصاءات" href="./allmembers"><img src="./style/images/icon/eye.png" width="24" /> </a>
                  <a style=" font-size:12px;float:left; margin: 3px 0 0 -22px;" class="nav-link" title="أعلى الرابحين" href="./winners"><img src="./style/images/icon/winners.png" width="24" /> </a>
                  <a style=" font-size:12px;float:left; margin: 3px 0 0 -22px;" class="nav-link" title="البحث عن كود الاشتراك" href="./allsearch"><img src="./style/images/icon/search.png" width="24" /> </a>
                  <a style=" font-size:12px;" class="nav-link" title="دعم مباشر" href="https://discord.gg/YhWJvYgKav" target="_blank"> <img src="./style/images/icon/sup.png" width="24" /> </a>
                </nav>
              </div>
            </div>
            <div class="col-md-8 themed-grid-col">
                <div class="pb-3">
                    <div class="row">
                        <div class="col-md-12 themed-grid-col logoposition">
                        <a class="navbar-brand" href="./">
                        <img src="./style/images/logo.png" height="130" class="d-inline-block align-top" alt="" loading="lazy"> 
                        </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="bd-cheatsheet container bg-body" style="padding-top:-45px;">
   <main class="container">
         <div class="bd-example"> </div>
       
          @yield('content')
         
        </div>
    </main>
</div>

@extends('layouts.style.footer')
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
       
  </body>
</html>

<script type="text/javascript">
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')
  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
})()

</script>