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

    public function haveImage()
    {
      return !is_null($this->meta->_thumbnail_id);
    }
}
