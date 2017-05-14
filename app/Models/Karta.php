<?php

namespace App\Models;

/**
 * Class Karta
 */
class Karta extends ValidationModel {
  /**
   * Jméno tabulky v databázi, ke které tento model patří.
   * @var string $table
   */
  protected $table = 'karta';

  /**
   * Jméno primárního klíče v tabulce.
   * @var string $primaryKey
   */
  protected $primaryKey = 'KARTA_ID';

  /**
   * Pole jmen atributů v databázi.
   * @var array $fillable
   */
  protected $fillable = [
    'POKOJ_ID',
    'KARTA_ID',
  ];

  protected $guarded = [];

  public function pokoj () {
    return $this->belongsTo('App\Models\Pokoj');
  }

}