<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toolkit extends Model
{
    public static function getCurrentLangText($text='')
    {
    	$split_regex = "#(<!--:[a-z]{2}-->|<!--:-->|\[:[a-z]{2}\]|\[:\]|\{:[a-z]{2}\}|\{:\})#ism";
		$arr = preg_split($split_regex, $text, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
		$result = array();

		if(count($arr) > 1) {
			for ($i=0; $i < count($arr)/2+1; $i++) {
				if(isset($arr[$i]) && isset($arr[$i+1]))
					$result[$arr[$i]] = $arr[++$i];
			}
		}

		return isset($result['[:'.\LaravelLocalization::getCurrentLocale().']']) ? $result['[:'.\LaravelLocalization::getCurrentLocale().']'] : str_replace(array('[:en]', '[:ru]', '[:]'), '', $text);
    }
}
