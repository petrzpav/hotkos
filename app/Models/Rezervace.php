<?php

namespace App\Models;

/**
 * Class Rezervace
 */
class Rezervace extends ValidationModel {
  public $timestamps = false;
  /**
   * Jméno tabulky v databázi, ke které tento model patří.
   * @var string $table
   */
  protected $table = 'rezervace';

  /**
   * Jméno primárního klíče v tabulce.
   * @var string $primaryKey
   */
  protected $primaryKey = 'REZERVACE_ID';

  /**
   * Pole jmen atributů v databázi.
   * @var array $fillable
   */
  protected $fillable = [
    'DO',
    'OD',
    'STAV',
    'REZERVACE_ID',
    'KARTA_ID',
    'HOST_ID',
    'POKOJ_ID',
    'ZAMESTNANEC_ID',
  ];

  protected $guarded = [];

  public function karta () {
    return $this->hasMany('App\Models\Karta', 'KARTA_ID');
  }
  public function host () {
    return $this->hasOne('App\Models\Host', 'HOST_ID');
  }
  public function pokoj () {
    return $this->hasOne('App\Models\Pokoj', 'POKOJ_ID');
  }

}