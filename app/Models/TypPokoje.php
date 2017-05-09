<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypPokoje
 */
class TypPokoje extends Model {

  public $timestamps = false;

  /**
   * Jméno tabulky v databázi, ke které tento model patří.
   * @var string $table
   */
  protected $table = 'typ pokoje';

  protected $primaryKey = 'TYP_POKOJE_ID';

  protected $fillable = [
    'CENA',
    'KAPACITA',
    'NAZEV',
    'POPISEK',
    'TYP_POKOJE_ID',
  ];

  protected $guarded = [];

  public function pokoj () {
    return $this->hasMany('App\Model\Pokoj');
  }
}