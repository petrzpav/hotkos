<?php

namespace App\Http\Controllers;

use App\Models\Pokoj;
use Illuminate\Http\Request;

use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class PageViewController
 * @package App\Http\Controllers
 */
class PageViewController extends Controller {

  /**
   * @return \Illuminate\View\View
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

  /**
   * @param int|null $roomId
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function getcreateReservation ($roomId = null) {
    return view('createReservation', ['roomid' => $roomId]);
  }

  /**
   * Vytvoření nového hosta a nové rezervace
   * @param Request $r
   * @param int $roomid
   * @return $this|\Illuminate\Http\RedirectResponse
   */
  public function postCreateReservation (Request $r, $roomid) {
    $errors = app('App\Http\Controllers\Business\ReservationController')
      ->createReservation(
        $roomid,
        $r->input('JMENO'),
        $r->input('PRIJMENI'),
        $r->input('EMAIL'),
        $r->input('ADRESA'),
        $r->input('OD'),
        $r->input('DO')
      );
    if (!is_null($errors)) {
      return back()->withInput()->withErrors($errors);
    }
    return redirect()
      ->action('PageViewController@getViewIndex')
      ->with('success', sprintf("Rezervace byla úspěšně vytvořena"));
  }

  /**
   * @return \Illuminate\View\View
   */
  public function getReservations () {
    return view('reservations');
  }

}
