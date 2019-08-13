<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersMeta extends Model
{
    protected $fillable = [ 'first_name', 'last_name', 'age' ];
}
