<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <link rel="mask-icon" href="{{ asset('assets/img/safari-pinned-tab.svg') }}" color="#4f407b">
    <meta name="theme-color" content="#4f407b">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Amer Krlicbegovic">

    {!! SEO::generate() !!}


    <!-- Styles -->
    <link href="{{ asset('assets/css/core.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/thesaas.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">



    @yield('scripts')
  </head>

    <div id="app">
    <!-- Topbar -->
    <nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
      <div class="container">
        
        <div class="topbar-left">
          <button class="topbar-toggler">&#9776;</button>
          <a class="topbar-brand" href="/">
            <img class="logo-default" src="{{ asset('assets/img/ks_color.png') }}" alt="logo">
            <img class="logo-inverse" src="{{ asset('assets/img/ks_white.png') }}" alt="logo">
          </a>
        </div>


        <div class="topbar-right">
          <ul class="topbar-nav nav">
            <li class="nav-item"><a class="nav-link" href="/">Naslovna</a></li>
            @auth
                @admin 
                  <li class="nav-item"><a href="{{ route('series.index') }}" class="nav-link">Izlistaj kurseve</a></li>
                  <li class="nav-item"><a href="{{ route('series.create') }}" class="nav-link">Napravi kurs</a></li>
                @else
                
                @endadmin
              <li class="nav-item"><a href="{{ route('all-series') }}" class="nav-link">Svi kursevi</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('profile', auth()->user()->username) }}"> {{ auth()->user()->name  }}</a></li>
              <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
            @endauth

            @guest
              <li class="nav-item"><a href="{{ route('all-series') }}" class="nav-link">Svi kursevi</a></li>
              <li class="nav-item"><a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#loginModal">Login / Registracija</a></li>
            @endguest
          </ul>
        </div>

      </div>
    </nav>
    <!-- END Topbar -->



    <!-- Header -->
    @yield('header')
    <!-- END Header -->
    <!-- Main container -->
    <main class="main-content">




      @yield('content')






    </main>
    <!-- END Main container -->







    <vue-noty></vue-noty>
    @guest
        <vue-login></vue-login>
    @endguest
      <footer class="site-footer">
        <div class="container">
          <div class="row gap-y align-items-center">
            <div class="col-12 col-lg-3">
              <p class="text-center text-lg-left">
                <a href="/"><img class="logo-default" src="{{ asset('assets/img/ks_color.png') }}" alt="logo"></a>
              </p>
            </div>

            <div class="col-12 col-lg-6">
            </div>

            <div class="col-12 col-lg-3">
              <div class="social text-center text-lg-right">
                <a class="social-facebook" href="https://www.facebook.com/KlikSkola-212864389281243/"><i class="fa fa-facebook"></i></a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/core.min.js') }}"></script>
    <script src="{{ asset('assets/js/thesaas.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('sw.js')}}"></script>

  </body>
</html>
