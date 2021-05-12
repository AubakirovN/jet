<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightRequest extends Model
{
    protected $connection = 'mysql';

    protected $fillable = [
        'departure_city',
        'arrival_city',
        'one_way',
        'departure_date',
        'arrival_date',
        'count_place',
        'user_id',
        'status',
        'comment',
        'phone'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
