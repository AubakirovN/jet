<?php

namespace App;

use App\Post as Corcel;
use App\Plane;
use App\Airport;


class Flight extends Corcel
{
    protected $connection = 'wordpress';
    protected $postType = 'flight';

    public function getPlaneTitle()
    {
        $post_meta = \App\PostMeta::where('meta_key', 'plane')->where('post_id', $this->ID)->first();
        $plane = Plane::find($post_meta->meta_value);
        return Toolkit::getCurrentLangText($plane->getTitle());
    }

    public function getPlaneImage()
    {
        $post_meta = \App\PostMeta::where('meta_key', 'plane')->where('post_id', $this->ID)->first();
        $plane = Plane::find($post_meta->meta_value);
        return $plane->getImage();
    }

    public function getFlightDate()
    {
        
    	return date('d', strtotime($this->flight_date)) . ' ' . trans('options.'.strtolower(date('F', strtotime($this->flight_date)))) . ', ' . strtolower(date('D', strtotime($this->flight_date)));
    }

    public function getArrivalDate()
    {
    	return date('d', strtotime($this->arrival_date)) . ' ' . trans('options.'.strtolower(date('F', strtotime($this->flight_date)))) . ', ' . strtolower(date('D', strtotime($this->arrival_date)));
    }

    public function getDepartureTime()
    {
    	return date('H:i',strtotime($this->departure_time));
    }

    public function getArrivalTime()
    {
    	return date('H:i',strtotime($this->arrival_time));
    }

    public function getDepartureCity()
    {
        $post_meta = \App\PostMeta::where('meta_key', 'departure_airport')->where('post_id', $this->ID)->first();
        $airport = Airport::find($post_meta->meta_value);
    
    	return Toolkit::getCurrentLangText($airport->getCity());
    }

    public function getArrivalCity()
    {
    	$post_meta = \App\PostMeta::where('meta_key', 'arrival_airport')->where('post_id', $this->ID)->first();
        $airport = Airport::find($post_meta->meta_value);
    
        return Toolkit::getCurrentLangText($airport->getCity());
    }

    public function getDepartureAirport($param=null)
    {
    	$post_meta = \App\PostMeta::where('meta_key', 'departure_airport')->where('post_id', $this->ID)->first();
        $airport = Airport::find($post_meta->meta_value);
        if($param == 'code')
        {
        	return $airport->getCode();
        }
    	return $airport->getTitle();
    }

    public function getArrivalAirport($param=null)
    {
    	$post_meta = \App\PostMeta::where('meta_key', 'arrival_airport')->where('post_id', $this->ID)->first();
        $airport = Airport::find($post_meta->meta_value);
        if($param == 'code')
        {
        	return $airport->getCode();
        }
    	return $airport->getTitle();
    	
    }

    public function getDuration()
    {
    	// $t1 = strtotime($this->departure_time);
    	// $t2 = strtotime($this->departure_time);
    	// $diff = $t2-$t1;
    	// return gmdate('G',strtotime($diff)) . 'ч ' . date('i',strtotime($diff)) . 'м ';
    	
    	return date('G',strtotime($this->duration)) . trans('options.hours') .' '. date('i',strtotime($this->duration)) . trans('options.min') .' ';
    
    }

    public function getCountPlace()
    {
        $post_meta = \App\PostMeta::where('meta_key', 'plane')->where('post_id', $this->ID)->first();
        $plane = Plane::find($post_meta->meta_value);
    
        return $plane->getPlaceCount();
    	//return $this->count_place;
    }

    public function getBookedPlace()
    {
        return $this->booked_place;
    }

    public function getCost()
    {
    	return $this->cost;
    }

    public function haveFood()
    {	
    	if($this->food == 1)
    	{
    		return true;
    	}
    	return false;
    }

    public function haveDepartureTransfer()
    {
    	if($this->departure_transfer == 1)
    	{
    		return true;
    	}
    	return false;
    }

    public function haveArrivalTransfer()
    {
        if($this->arrival_transfer == 1)
        {
            return true;
        }
        return false;
    }

    public function haveTerminal()
    {
    	if($this->vip_terminal == 1)
    	{
    		return true;
    	}
    	return false;
    }

    public function getComment()
    {
    	return str_replace("\r\n\r\n",'<br \><br \>',Toolkit::getCurrentLangText($this->comment));
    }

	public function viewFlight()
    {
       
        return '/'. $this->post_type . '/view/' . $this->ID;
    }

    
}
