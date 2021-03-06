<?php

namespace App;

use Corcel\Model\Post as Corcel;

class Post extends Corcel
{
    protected $connection = 'wordpress';

     public function getTitle()
    {
    	return Toolkit::getCurrentLangText($this->post_title);
    }

    public function getDescription()
    {
    	return mb_substr(strip_tags(Toolkit::getCurrentLangText($this->getContent())),0,200);
    }

	public function getContent()
    {
    	return str_replace("\r\n\r\n",'<br \><br \>',Toolkit::getCurrentLangText($this->post_content));
    }

    public function getDate()
    {
        return date('F', strtotime($this->post_date)) . ' ' . date('j', strtotime($this->post_date)) . ', ' . date('Y', strtotime($this->post_date));
    }

    public function haveImage()
    {
      return !is_null($this->thumbnail);
    }

    public function getImage()
    {
        if($this->thumbnail !== null)
        {
            return $this->thumbnail;
        }
        // this is default image
        return "/assets/images/citationx.jpg";
    }

    public function getUrl()
    {
       
        return '/'. (\LaravelLocalization::getCurrentLocale() == 'ru' ? '' : \LaravelLocalization::getCurrentLocale() .'/'). $this->post_type . '/view/' . $this->ID;
    }

    
}
