<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Post;
use App\Page;
use App\Slider;
use App\Plane;
use App\Flight;
use App\FlightRequest;
use App\User;
use App\Reservation;


class HomeController extends Controller
{
    public function index()
    {
    	$about = Post::type('page')->slug('believe-info')->first();
    	$service = Post::type('page')->slug('services')->first();
    	$slider = Slider::all();
    	$planes = Plane::status('publish')->take(3)->get();
  
    	
    	return view('front-page', compact('slider','planes','about','service'));
    }

    public function flights()
    {
    	
    	$flights = Flight::status('publish')->get();
    	
    	//dd($flights); die();
    	return view('flights',compact('flights'));
    }

    public function viewFlight($id)
    {
    	$flight = Flight::find($id);

        $post_meta = \App\PostMeta::where('meta_key', 'plane')->where('post_id', $id)->first();
        $plane = Plane::find($post_meta->meta_value);
        $images = $plane->getImages();
        

    	return view('detail', compact('flight', 'images'));
    }

    public function bookFlight(Request $request)
    {

        $input = $request->all();
    
        $request->validate([
           'count_place' => 'required',
           'name' => 'required',
           'phone' => 'required'
         ]);

        $check = new Reservation;

        $check->flight_id = $request->flight_id;
        $check->departure_city = $request->departure_city;
        $check->arrival_city = $request->arrival_city;
        $check->user_id = $request->user_id;
        $check->phone = $request->phone;
        $check->departure_date = $request->departure_date;
        $check->flight_duration = $request->flight_duration;
        $check->plane = $request->plane;
        $check->name = $request->name;
        $check->count_place = $request->count_place;
        $check->comment = $request->comment;

        $check->save();

         $arr = array('msg' => 'Something goes to wrong. Please try again later', 'status' =>false);
         if($check){ 
            $arr = array('msg' => 'Successfully Form Submit', 'status' => true);
         }
        return response()->json($arr);
    }

    public function requestFlight(Request $request)
    {

        $input = $request->all();
        $departure_date = Carbon::parse($request->departure_date)->format('Y-m-d');
        $user = User::find($request->user_id);

        $check = new FlightRequest;

        $check->departure_city = $request->departure_city;
        $check->arrival_city = $request->arrival_city;
        $check->email = $user->email;
        $check->name = $request->name;
        $check->departure_date = $departure_date;
        if(!isset($request->one_way)) {
            $check->arrival_date = Carbon::parse($request->arrival_date)->format('Y-m-d');
        }
        $check->count_place = $request->count_place;

        $check->phone = preg_replace("/[^0-9]/", "", $request->phone);
        $check->save();

         $arr = array('msg' => 'Something goes to wrong. Please try again later', 'status' =>false);
         if($check){ 
            $arr = array('msg' => 'Successfully Form Submit', 'status' => true);
         }
        return response()->json($arr);
    }

    public function viewPost($id = null)
    {
    	$post = Post::find($id);

    	return view('single', compact('post'));
    }

     public function page($param = null )
    {
    
    	$page = Page::where('post_name', $param)->where('post_status', 'publish')->first();
    	
    	if($page == null)
			abort(404);


		return view('page', compact('page'));
    }
}
