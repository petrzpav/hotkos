<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Host
 */
class Host extends Model
{
  public $timestamps = false;
  /**
   * Jméno tabulky v databázi, ke které tento model patří.
   * @var string $table
   */
  protected $table = 'host';
  /**
   * Jméno primárního klíče v tabulce.
   * @var string $primaryKey
   */
  protected $primaryKey = 'HOST_ID';
  /**
   * Pole jmen atributů v databázi.
   * @var array $fillable
   */
  protected $fillable = [
    'EMAIL',
    'JMENO',
    'PRIJMENI',
    'HOST_ID',
    'ADRESA'
  ];

  protected $guarded = [];


}
