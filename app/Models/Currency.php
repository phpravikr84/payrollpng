<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    
    protected $fillable = [
        'currency_code',
        'currency_name',
        'exchange_rate',
        'exchange_currency',
        'last_er_update',
        'status',
    ];
}
