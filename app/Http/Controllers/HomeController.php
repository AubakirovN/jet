<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Page;


class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::all();

    	return view('front-page', compact('posts'));
    }

    public function viewPost($id = null)
    {
    	$post = Post::find($id);

    	return view('single', compact('post'));
    }

     public function page($param = null, $subparam = null )
    {
    
    	$page = Page::where('post_name', $param)->where('post_status', 'publish')->first();
    	
    	if($page == null)
			abort(404);

		$sub_menu = \App\Menu::getSubMenu('main-menu', $page->ID);

		if($sub_menu == null)
			abort(404);

		$flag = true;
		$sub_page = null;
		foreach ($sub_menu as $menu) {
			if($menu->slug == $subparam) {
				$flag = false;
				$sub_page = Page::find($menu->ID);
			}
		}

		if($sub_page == null || ($flag && $subparam != null && $sub_page->post_parent != $page->ID))
			abort(404);

		return view('page', compact('page', 'sub_page', 'sub_menu'));
    }
}
