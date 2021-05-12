<?php

namespace App;

use App\Post as Corcel;

class Bort extends Corcel
{
    protected $connection = 'wordpress';
    protected $postType = 'bort';

    public function getCode()
    {
    	return $this->airport_code;
    }

    public function getShortName()
    {
    	return $this->short_name;
    }

    public function getLongName()
    {
    	return $this->long_name;
    }
}
