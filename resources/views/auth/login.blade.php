@extends('template')

@section('title', 'Přihlášení - Hotel Hošice')

@section('content')

<h2>Přihlášení</h2>

{!! Form::open(array('action' => 'Auth\AuthController@postLogin')) !!}
  <dl class="login">
    <dt><label for="email">email:</label></dt>
    <dd><input type="email" placeholder="josef@novak.cz" name="email" value="{{ old('email') }}"></dd>
    <dt><label for="password">Heslo:</label></dt>
    <dd><input type="password" name="password"></dd>
    <dt>Odeslání formuláře</dt>
    <dd><label>Zapamatovat si přihlášení <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}></label></dd>
    <dd><input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="submit" name="submit" value="Přihlásit se"></dd>
  </dl>
{!! Form::close() !!}

@endsection
