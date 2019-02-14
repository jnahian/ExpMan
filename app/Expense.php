<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;
    protected $guarded = [ 'id', 'uuid' ];
    protected $dates = [ 'created_at', 'updated_at', 'deleted_at', 'date' ];
}
