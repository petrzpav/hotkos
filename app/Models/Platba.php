<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Platba
 */
class Platba extends Model
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