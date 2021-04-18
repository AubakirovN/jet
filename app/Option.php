<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $connection = 'wordpress';
    protected $primaryKey = 'option_id';
}
