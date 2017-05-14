@extends('template')

@section('title', 'Hotel Košice')

@section('content')

  <h2>Všechny volné pokoje</h2>
  @foreach($freeRooms as $room)
    <dl>
      <dt>Popis</dt>
      <dd>{{ $room->typPokoje->NAZEV }}</dd>
      <dd>{{ $room->typPokoje->POPISEK }}</dd>
      <dt>Cena</dt>
      <dd>{{ $room->ZAKLADNI_CENA + $room->typPokoje->CENA  }}</dd>
      <dt>Kapacita</dt>
      <dd>{{ $room->typPokoje->KAPACITA }}</dd>
      <dt><a href="{{ action('PageViewController@getCreateReservation', [ 'roomid' => $room->POKOJ_ID ]) }}">Rezervovat
          pokoj</a></dt>
    </dl>
  @endforeach

@endsection