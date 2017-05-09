@extends('template')

@section('title', 'Registrace - Motivátor')

@section('content')

  <h2>Registrace</h2>

  {!! Form::open(array('action' => 'Auth\AuthController@postRegister')) !!}
  <dl class="registration">
    <dt><label for="name">Jméno:</label></dt>
    <dd><input type="text" placeholder="Josef" name="JMENO" value="{{ old('JMENO') }}"></dd>
    <dt><label for="surname">Příjmení:</label></dt>
    <dd><input type="text" placeholder="Novák" name="PRIJMENI" value="{{ old('PRIJMENI') }}"></dd>
    <dt><label for="address">Adresa:</label></dt>
    <dd><input type="address" placeholder="Nerudova 24, 180 00 Praha 8" name="ADRESA" value="{{ old('ADRESA') }}"></dd>
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
