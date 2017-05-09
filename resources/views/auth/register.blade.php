@extends('template')

@section('title', 'Registrace - Motivátor')

@section('content')

<h1>Registrace</h1>

{!! Form::open(array('action' => 'Auth\AuthController@postRegister')) !!}
  <dl class="registration">
    <dt><label for="name">Jméno:</label></dt>
    <dd><input type="text" placeholder="Josef" name="name" value="{{ old('name') }}"></dd>
    <dt><label for="surname">Příjmení:</label></dt>
    <dd><input type="text" placeholder="Novák" name="surname" value="{{ old('surname') }}"></dd>
    <dt><label for="nickname">Nick (volitelné):</label></dt>
    <dd><input type="text" placeholder="Novák" name="nickname" value="{{ old('nickname') }}"></dd>
    <dt><label for="birthdate">Datum narození:</label></dt>
    <dd>{!! Form::date('birthdate'); !!}</dd>
    <dt><label for="email">Email:</label></dt>
    <dd><input type="email" placeholder="jan.novak@email.cz" name="email" value="{{ old('email') }}"></dd>
    <dt><label for="password">Heslo:</label></dt>
    <dd><input type="password" name="password"></dd>
    <dt><label for="password_confirmation">Kontrola hesla:</label></dt>
    <dd><input type="password" name="password_confirmation"></dd>
    <dt>Odeslání formuláře</dt>
    <dd><input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="submit" name="submit" value="Registrovat"></dd>
  </dl>
{!! Form::close() !!}


@endsection