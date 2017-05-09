<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="cs">
  <head>
    <meta charset="utf-8"/>
    <meta content="initial-scale=1" name="viewport"/>
    <meta content="hotkos" name="author"/>
    <title>@yield('title')</title>
    {!! HTML::style('css/default.css') !!}
  </head>

  <body>
  <body>
  <div class="header">
  </div>
  </body>
    <div id="header">
      <h1>{!! link_to('/', 'Hotel Košice') !!}</h1>
      @include('errors')
      @yield('header')
    </div>
    <div id="main">
      @yield('content')
    </div>
    <div class="footer">
      <ul>
        @if(Auth::guest())
        <li><a href="{{ action('Auth\AuthController@getLogin') }}">Přihlášení obsluhy</a></li>
        <li><a href="{{ action('Auth\AuthController@getRegister') }}">Registrace obsluhy</a></li>
        @else
        <li>Přihlášený uživatel: {{ Auth::user()->JMENO }} {{ Auth::user()->PRIJMENI }} <a href="{{ action('Auth\AuthController@getLogout') }}">Odhlásit se</a></li>
        @endif
        </ul>
      &copy; 2017 Hotel Košice
    </div>
  </body>
</html>