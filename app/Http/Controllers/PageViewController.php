<?php

namespace App\Http\Controllers;

use App\Models\Pokoj;
use Illuminate\Http\Request;

use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageViewController extends Controller {

  /**
   * Show main page
   */
  public function getViewIndex () {
    $freeRooms = Pokoj::where('rezervovany', 0)->get();
    return view(
      'main',
      [
        'freeRooms' => $freeRooms,
      ]
    );
  }

  public function getReservations () {
    return view('reservations');
  }

}
