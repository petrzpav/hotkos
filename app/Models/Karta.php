<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Karta
 */
class Karta extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'POKOJ_ID',
        'KARTA_ID'
    ];

    protected $guarded = [];

        
}