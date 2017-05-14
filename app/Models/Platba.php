<?php

namespace App\Models;

/**
 * Class Platba
 */
class Platba extends ValidationModel
{

    public $timestamps = false;

    protected $fillable = [
        'CENA',
        'DATUM',
        'TYP',
        'PLATBA_ID',
        'REZERVACE_ID'
    ];

    protected $guarded = [];

        
}