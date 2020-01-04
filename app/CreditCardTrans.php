<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreditCardTrans extends Model
{
    use SoftDeletes;

    protected $casts = [
        'emi'        => 'array',
        'trans_date' => 'date'
    ];

    protected $guarded = ['id'];
}
