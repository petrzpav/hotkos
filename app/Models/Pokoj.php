<?php

namespace App\Models;

/**
 * Class Pokoj
 */
class Pokoj extends ValidationModel {
  public $timestamps = false;

  /**
   * Jméno tabulky v databázi, ke které tento model patří.
   * @var string $table
   */
  protected $table = 'pokoj';

  /**
   * Jméno primárního klíče v tabulce.
   * @var string $primaryKey
   */
  protected $primaryKey = 'POKOJ_ID';

  /**
   * Pole jmen atributů v databázi.
   * @var array $fillable
   */
  protected $fillable = [
    'ZAKLADNI_CENA',
    'POKOJ_ID',
    'TYP_POKOJE_ID',
    'rezervovany',
  ];

  protected $guarded = [];

  public function typPokoje () {
    return $this->belongsTo('App\Models\TypPokoje', 'TYP_POKOJE_ID');
  }

  public function rezervace () {
    return $this->hasMany('App\Models\Rezervace', 'REZERVACE_ID');
  }

}
