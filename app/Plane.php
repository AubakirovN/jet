<?php

namespace App;

use App\Post as Corcel;
use App\Bort;

class Plane extends Corcel
{
    protected $connection = 'wordpress';
    protected $postType = 'plane';

    public function getDuration()
    {
    	return $this->duration;
    }

    public function getPlaceCount()
    {
    	return $this->place_count;
    }

    public function getCabinHeight()
    {
    	return $this->cabin_height;
    }

    public function getYear()
    {
      return $this->year;
    }

    public function getComment()
    {
      str_replace("\r\n\r\n",'<br \><br \>',Toolkit::getCurrentLangText($this->comment));
    }

    
    public function getRegistrationNumber()
    {
      return $this->registration_number;
    }

    public function getBortType($param)
    {
        $post_meta = \App\PostMeta::where('meta_key', 'bort')->where('post_id', $this->ID)->first();
        $bort = Bort::find($post_meta->meta_value);
        if($param=='code')
        {
          return $bort->getCode();
        }
        if($param=='short_name')
        {
          return $bort->getShortName();
        }
    }

    public function getImages()
    {
        $post_meta = \App\PostMeta::where('meta_key', 'photos')->where('post_id', $this->ID)->get();
        $img = null;
        $images = array();
          foreach ($post_meta as $value) {
            
            $img = \App\Attachment::find($value->meta_value); 
            $images[] = $img->guid;
          }
          
        
        
        return $images;
    }


}
