@extends('template')

@section('title', 'Nová rezervace - Hotel Košice')

@section('content')

  <h2>Nová rezervace</h2>

  {!! Form::open(array('action' => array('PageViewController@postCreateReservation', $roomid))) !!}
  <fieldset>
    <legend>Osobní údaje</legend>
    <dl class="registration">
      <dt><label for="JMENO">Jméno:</label></dt>
      <dd><input type="text" placeholder="Josef" name="JMENO" value="{{ old('JMENO') }}"></dd>
      <dt><label for="PRIJMENI">Příjmení:</label></dt>
      <dd><input type="text" placeholder="Novák" name="PRIJMENI" value="{{ old('PRIJMENI') }}"></dd>
      <dt><label for="EMAIL">Email:</label></dt>
      <dd><input type="text" placeholder="jav@novak.cz" name="EMAIL" value="{{ old('EMAIL') }}"></dd>
      <dt><label for="ADRESA">Adresa:</label></dt>
      <dd><input type="address" placeholder="Nerudova 24, 180 00 Praha 8" name="ADRESA" value="{{ old('ADRESA') }}">
      </dd>
    </dl>
  </fieldset>
  <fieldset>
    <legend>Detaily rezervace</legend>
    <dl>
      <dt><label for="OD">Od:</label></dt>
      <dd><input type="date" name="OD" value="{{ \Carbon\Carbon::now()->addDays(1)->format('Y-m-d') }}"></dd>
      <dt><label for="DO">Do:</label></dt>
      <dd><input type="date" name="DO" value="{{ \Carbon\Carbon::now()->addDays(3)->format('Y-m-d') }}"></dd>
      <dt>Odeslání formuláře</dt>
      <dd><input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="submit" name="submit"
                                                                               value="Rezervovat"></dd>
    </dl>
  </fieldset>
  {!! Form::close() !!}

@endsection