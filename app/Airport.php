<?php

namespace App;

use App\Post as Corcel;

class Airport extends Corcel
{
    protected $connection = 'wordpress';
    protected $postType = 'airport';

     public function getCode()
    {
    	return $this->airport_code;
    }

     public function getCity()
    {
    	return $this->city;
    }
}
