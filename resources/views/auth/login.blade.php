@extends('template')

@section('title', 'Přihlášení - Motivátor')

@section('content')

<h2>Přihlášení</h2>

{!! Form::open(array('action' => 'Auth\AuthController@postLogin')) !!}
  <dl class="login">
    <dt><label for="id">ID Zaměstnance:</label></dt>
    <dd><input type="id" placeholder="123" name="ZMANESTNANEC_ID" value="{{ old('ZAMESTNANEC_ID') }}"></dd>
    <dt><label for="password">Heslo:</label></dt>
    <dd><input type="password" name="HESLO"></dd>
    <dt>Odeslání formuláře</dt>
    <dd><label>Zapamatovat si přihlášení <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}></label></dd>
    <dd><input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="submit" name="submit" value="Přihlásit se"></dd>
  </dl>
{!! Form::close() !!}

@endsection
