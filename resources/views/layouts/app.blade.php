<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Engineer Masters | @yield('title')</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('asset/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/templatemo-edu-meeting.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/lightbox.css') }}">

    @yield('extra-css')

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
            <!-- Sub Header -->
            <div class="sub-header">
                <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-sm-8">
                    <div class="left-content">
                        <p>Welcome to Engineer Masters <em>Online Exam</em> Created by Nikhil Shukla.</p>
                    </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                    <div class="right-icons">
                        <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <!-- ***** Header Area Start ***** -->
            <header class="header-area header-sticky bg-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="main-nav">
                                <!-- ***** Logo Start ***** -->
                                <a href="/" class="logo">
                                    Online Exam
                                </a>
                                <!-- ***** Logo End ***** -->
                                <!-- ***** Menu Start ***** -->
                                <ul class="nav">
                                    <!-- <li class="scroll-to-section"><a href="#top" class="active">Welcome</a></li> -->
                                    @if (Route::has('login'))
                                        @auth
                                            <li><a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a></li>
                                        @endauth
                                    @endif
                                    <li class="{{ Route::is('/view-exam') ? 'active' : '' }}"><a href="{{ route('viewExam') }}">Exams</a></li>
                                    <li class="scroll-to-section"><a href="#apply">Apply Now</a></li>
                                    <!-- <li class="has-sub">
                                        <a href="javascript:void(0)">Pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Upcoming Meetings</a></li>
                                            <li><a href="#">Meeting Details</a></li>
                                        </ul>
                                    </li> -->
                                    <!-- <li class="scroll-to-section"><a href="#courses">Courses</a></li>  -->
                                    <li class="scroll-to-section"><a href="#contact">Contact Us</a></li> 
                                    <li>
                                        @if (Route::has('login'))
                                                @auth
                                                    <!-- <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a> -->
                                                    <li class="has-sub">
                                                        <a href="javascript:void(0)">{{ Auth::user()->name }}</a>
                                                        <ul class="sub-menu">
                                                            <li> 
                                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                                    onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();">
                                                                    {{ __('Logout') }}
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                @else
                                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="width:80px;float:left;">Log in</a>
                                                    @if (Route::has('register'))
                                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline" style="float:left;">Register</a>
                                                    @endif
                                                @endauth
                                        @endif
                                    </li>
                                
                                </ul>        
                                <a class='menu-trigger'>
                                    <span>Menu</span>
                                </a>
                                <!-- ***** Menu End ***** -->
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <!-- ***** Header Area End ***** -->
            
    <div id="app">

        <main class="">
            @yield('content')
        </main>
    </div>
    
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <!-- <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->

    <script src="{{ asset('asset/js/isotope.min.js') }}"></script>
    <script src="{{ asset('asset/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('asset/js/lightbox.js') }}"></script>
    <script src="{{ asset('asset/js/tabs.js') }}"></script>
    <script src="{{ asset('asset/js/video.js') }}"></script>
    <script src="{{ asset('asset/js/slick-slider.js') }}"></script>
    <script src="{{ asset('asset/js/custom.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
    @yield('extra-script')
 </body>
</html>
