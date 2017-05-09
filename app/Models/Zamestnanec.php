<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * Class Zamestnanec
 */
class Zamestnanec extends Model implements AuthenticatableContract,
  AuthorizableContract,
  CanResetPasswordContract
{
  use Authenticatable, Authorizable, CanResetPassword;

  public $timestamps = false;
  /**
   * Jméno tabulky v databázi, ke které tento model patří.
   * @var string $table
   */
  protected $table = 'zamestnanec';
  /**
   * Jméno primárního klíče v tabulce.
   * @var string $primaryKey
   */
  protected $primaryKey = 'ZAMESTNANEC_ID';
  /**
   * Pole jmen atributů v databázi.
   * @var array $fillable
   */
  protected $fillable = [
    'JMENO',
    'PRIJMENI',
    'ADRESA',
    'email',
    'password',
    'ZAMESTNANEC_ID'
  ];

  protected $guarded = [];

  /**
   * Pole atributu, ktere maji byt skryte pro serializaci.
   * @var array
   */
  protected $hidden = ['ZAMESTNANEC_ID', 'remember_token'];


}
