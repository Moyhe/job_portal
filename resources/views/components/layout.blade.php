<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Job portal</title>
     <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
     <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
     <link rel="stylesheet" href="{{ asset('fonts/line-icons/style.css') }}">
     <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
     <link rel="stylesheet" href="{{ asset('css/quill.snow.css') }}">
     <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/custom-bs.css') }}">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
     <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body id="top">

	<main class="site-wrap">
        {{-- <nav class="navbar navbar-expand-lg bg-dark shadow-lg" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="/">TechJobs</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item me-4">
                            <a class="nav-link {{  request()->is('/') ? 'active' : '' }}"  aria-current="page" href="/">Home</a>
                        </li>

                        @auth
                        <li class="nav-item  dropdown">
                            <a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(auth()->user()->profile_pic)
                                <img src="{{Storage::url( auth()->user()->profile_pic)}}" width="40" height="40" class="rounded-circle mx-auto p-1">
                                @else
                                <img src="https://placehold.co/400" class="rounded-circle" width="40 ">
                                @endif
                            </a>
                            <ul class="dropdown-menu">
                                @if(auth()->user()->user_type === 'seeker')
                                <li class="nav-item">
                                    <a class="nav-link {{  request()->is('user/profile/seeker') ? 'active' : '' }}" aria-current="page" href="{{route('seeker.profile')}}">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{  request()->is('user/job/applied') ? 'active' : '' }}" aria-current="page" href="{{route('job.applied')}}">Job applied</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" id="logout" href="#">Logout</a>
                            </li>

                            <form id="form-logout" action="{{route('logout')}}" method="post">
                                @csrf
                            </form>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" id="" href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                @endif
                            </ul>
                        </li>

                        @else
                            <li class="nav-item">
                                <a class="nav-link {{  request()->is('login') ? 'active' : '' }}"  href="{{route('login')}}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  {{  request()->is('register/seeker') ? 'active' : '' }}" href="{{route('create.seeker')}}">Job Seeker</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link {{  request()->is('register/employer') ? 'active' : '' }}"  href="{{route('create.employer')}}">Company</a>
                            </li>
                        @endauth

                    </ul>
                </div>
            </div>
        </nav> --}}

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
              <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
              </div>
            </div>
            <div class="site-mobile-menu-body"></div>
          </div> <!-- .site-mobile-menu -->

              <!-- NAVBAR -->
    <header class="site-navbar mt-3">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="site-logo col-6"><a href="/">JobBoard</a></div>

            <nav class="mx-auto site-navigation">
              <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                <li><a href="index.html" class="nav-link active">Home</a></li>
                <li><a href="about.html">About</a></li>

                <li><a href="profile.html">Profile</a></li>

                <li><a href="contact.html">Contact</a></li>
                <li class="d-lg-none"><a href="post-job.html"><span class="mr-2">+</span> Post a Job</a></li>
                <li class="d-lg-none"><a href="login.html">Log In</a></li>
              </ul>
            </nav>

            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
              <div class="ml-auto">
                <a href="post-job.html" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>
                <a href="{{route('create.employer')}}" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Compay</a>
                <a href="{{route('create.seeker')}}" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Seeker</a>
                <a href="{{route('login')}}" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
              </div>
              <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
            </div>

          </div>
        </div>
      </header>

        {{ $slot }}

        <footer class="site-footer">

            <a href="#top" class="smoothscroll scroll-top">
              <span class="icon-keyboard_arrow_up"></span>
            </a>

            <div class="container">
              <div class="row mb-5">
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                  <h3>Search Trending</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Graphic Design</a></li>
                    <li><a href="#">Web Developers</a></li>
                    <li><a href="#">Python</a></li>
                    <li><a href="#">HTML5</a></li>
                    <li><a href="#">CSS3</a></li>
                  </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                  <h3>Company</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Resources</a></li>
                  </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                  <h3>Support</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                  </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                  <h3>Contact Us</h3>
                  <div class="footer-social">
                    <a href="#"><span class="icon-facebook"></span></a>
                    <a href="#"><span class="icon-twitter"></span></a>
                    <a href="#"><span class="icon-instagram"></span></a>
                    <a href="#"><span class="icon-linkedin"></span></a>
                  </div>
                </div>
              </div>

              <div class="row text-center">
                <div class="col-12">
                  <p class="copyright"><small>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>. Downloaded from <a href="https://themeslab.org/" target="_blank">Themeslab</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>
                </div>
              </div>
            </div>
          </footer>

    </main>

 <!-- SCRIPTS -->

	<script>
		let logout = document.getElementById('logout');
		let form = document.getElementById('form-logout');
		logout.addEventListener('click', function() {
			form.submit();
		})
	</script>


<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/stickyfill.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/quill.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
