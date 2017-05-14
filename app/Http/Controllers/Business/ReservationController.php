<?php

namespace App\Http\Controllers\Business;

use App\Models\Host;
use App\Models\Pokoj;
use App\Models\Rezervace;

use App\Http\Controllers\Controller;

/**
 * Class ReservationController
 * @package App\Http\Controllers\Business
 */
class ReservationController extends Controller {

  const STATE_CANCELED = 'canceled';
  const STATE_DONE = 'done';
  const STATE_NEW = 'new';
  const STATE_PAID = 'paid';

  /**
   * Vytvoření a validace rezervace-
   * @param $roomid
   * @param $jmeno
   * @param $prijemni
   * @param $email
   * @param $adresa
   * @param $od
   * @param $do
   * @return \App\Models\Illuminate\Support\MessageBag|null
   */
  public function createReservation ($roomid, $jmeno, $prijemni, $email, $adresa, $od, $do) {
    $host = Host::create(
      [
        "JMENO" => $jmeno,
        "PRIJMENI" => $prijemni,
        "EMAIL" => $email,
        "ADRESA" => $adresa,
      ]
    );
    if ($host->hasErrors()) {
      return $host->getErrors();
    }
    $rezervace = Rezervace::create(
      [
        'OD' => $od,
        'DO' => $do,
        'STAV' => self::STATE_NEW,
        'HOST_ID' => $host->HOST_ID,
        'POKOJ_ID' => $roomid,
      ]
    );
    if ($rezervace->hasErrors()) {
      return $rezervace->getErrors();
    }
    $room = Pokoj::find($roomid);
    $room->rezervovany = 1;
    $room->save();
    return null;
  }
}
