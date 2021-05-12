<?php

namespace App;

use Corcel\Model\MenuItem as Corcel;

class Menu extends Corcel
{
    protected $connection = 'wordpress';

    public static function getMenu($slug = null)
    {
    	$menu = Menu::slug($slug)->first();
        // $items = Menu::slug($slug)->first()->items;
        // dd($items);
    	// $menuArray = array();
    	// foreach ($menu->nav_menu_item as $item) {
    	// 	$parent_id = $item->meta->_menu_item_menu_item_parent;

     //      if ($item->meta->_menu_item_object != 'category') {
     //        $item = \App\Post::find($item->meta->_menu_item_object_id);
     //      }
     //      else {
     //        $item = \App\Term::find($item->meta->_menu_item_object_id);
     //      }

     //      $menuArray[$parent_id][] = $item;
    	// }
    	return $menu;
    }

    public static function getSubMenu($slug, $pid)
    {
    	$menu = Menu::getmenu($slug);

    	$meta = \App\PostMeta::where('meta_key', '_menu_item_object_id')->where('meta_value', $pid)->first();

    	if($meta != null && isset($menu[$meta->post_id]))
    		return $menu[$meta->post_id];

    	return array();
    }
}
