<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Models\Zamestnanec;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {
  /*
  |--------------------------------------------------------------------------
  | Registration & Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users, as well as the
  | authentication of existing users. By default, this controller uses
  | a simple trait to add these behaviors. Why don't you explore it?
  |
  */

  use AuthenticatesAndRegistersUsers, ThrottlesLogins;

  protected $redirectTo = '/';

  private $maxLoginAttempts = 3;

  /**
   * Create a new authentication controller instance.
   *
   * @return void
   */
  public function __construct () {
    $this->middleware('guest', ['except' => 'getLogout']);
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator (array $data) {
    return Validator::make(
      $data,
      [
        'JMENO' => 'required|max:255',
        'PRIJMENI' => 'required|max:255',
        'ADRESA' => 'required|max:255',
        'HESLO' => 'required|confirmed|min:6',
      ]
    );
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array $data
   * @return Zamestnanec
   */
  protected function create (array $data) {
    return Zamestnanec::create(
      [
        'JMENO' => $data['JMENO'],
        'PRIJMENI' => $data['PRIJMENI'],
        'ADRESA' => $data['ADRESA'],
        'HESLO' => bcrypt($data['HESLO']),
      ]
    );
  }
}
