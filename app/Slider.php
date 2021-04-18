<?php

namespace App;

use Corcel\Model\Slider as Corcel;

class Slider extends Corcel
{
    protected $connection = 'wordpress';
    protected $postType = 'slider';

    public function getSliderTitle() {
        return Toolkit::getCurrentLangText($this->acf->slider_title));
    }
    public function getSliderDescription(){
    	return Toolkit::getCurrentLangText($this->getMeta('wpcf-slider_description'));
    }
}
