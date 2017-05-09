<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rezervace
 */
class Rezervace extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'DO',
        'OD',
        'STAV',
        'REZERVACE_ID',
        'KARTA_ID',
        'HOST_ID',
        'POKOJ_ID',
        'ZAMESTNANEC_ID'
    ];

    protected $guarded = [];

        
}