<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Flight;

class Reservation extends Model
{
    protected $connection = 'mysql';
    
    protected $fillable = [
        'flight_id',
        'user_id',
        'count_place',
        'status',
        'comment',
        'phone',
        'name',
        'plane', 
        'departure_city', 
        'arrival_city',
        'departure_date',
        'flight_duration'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
