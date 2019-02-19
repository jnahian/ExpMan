<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;

    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';
    public    $incrementing = false;

    protected $guarded = [ 'id', 'uuid' ];
    protected $dates   = [ 'created_at', 'updated_at', 'deleted_at', 'date' ];
}
