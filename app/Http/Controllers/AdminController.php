<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Reservation;
use App\Flight;
use App\FlightRequest;
use DataTables;


class AdminController extends Controller
{
    //

    public function index()
    {
    	return view('dashboard.dashboard');
    }

    public function users()
    {
    	$users = User::all();
    	return view('dashboard.users', compact('users'));
    }

    public function userEdit($id)
    {
    	$user = User::FindOrFail($id);
    	return view('dashboard.useredit', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
    	$user = User::Find($id);
    	//$user->name = $request->input('name');
    	$user->usertype = $request->input('usertype');
   	
    	$user->update();

    	return redirect("/dashboard/users")->with('status', 'User updated');
    }
    public function userDelete(Request $request, $id)
    {
    	$user = User::FindOrFail($id);
    	
   	
    	$user->delete();

    	return redirect("/dashboard/users")->with('status', 'User deleted');
    }

    public function reservations(Request $request)
    {
        //$reservations = Reservation::paginate(15);
        if ($request->ajax()) {
            $data = Reservation::select('id','flight_id','user_id','count_place','status','comment','phone','name','plane', 'departure_city', 'arrival_city', 'departure_date', 'flight_duration');
           
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                         if($row->status == 'new'){
                            return '<span class="badge badge-primary">Новый</span>';
                         }elseif($row->status == 'reject'){
                            return '<span class="badge badge-danger">Отклонен</span>';
                         }else{
                            return '<span class="badge badge-success">Потвержден</span>';
                         }
                    })
                    ->filter(function ($instance) use ($request) {
                        if ($request->get('status') == 'new' || $request->get('status') == 'reject' || $request->get('status') == 'confirm') {
                            $instance->where('status', $request->get('status'));
                        }
                        if (!empty($request->get('search'))) {
                             $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->orWhere('name', 'LIKE', "%$search%")
                                ->orWhere('flight_id', 'LIKE', "%$search%")
                                ->orWhere('phone', 'LIKE', "%$search%");
                            });
                        }
                    })
                    ->rawColumns(['status'])
                    ->make(true);
        }

        return view('dashboard.reservations');
    }

    public function reservationEdit($id)
    {
        $reserve = Reservation::FindOrFail($id);
        return view('dashboard.reservationedit', compact('reserve'));
    }

    public function reservationUpdate(Request $request, $id)
    {
        $reserve = Reservation::Find($id);
        //$user->name = $request->input('name');
        $reserve->status = $request->input('status');
    
        $reserve->update();
        $flight = DB::table(DB::raw('jet_project.wp_postmeta'))->where('post_id',$reserve->flight_id)->where('meta_key','booked_place')->update(['meta_value' => 5]);
        
        
  
        return redirect("/dashboard/reservations")->with('status', 'Рейс обновлен');
    }

     public function reservationDelete(Request $request, $id)
    {
        $reserve = Reservation::FindOrFail($id);
        
    
        $reserve->delete();

        return redirect("/dashboard/reservations")->with('status', 'Рейс удален');
    }


     public function viewRequests(Request $request)
    {
        //$reservations = Reservation::paginate(15);
        if ($request->ajax()) {
            $data = FlightRequest::select(
                'id','name','departure_city', 'arrival_city', 
                'departure_date','arrival_date','count_place',
                'email','status','result_comment','phone'
            );
           
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                         if($row->status == 'new'){
                            return '<span class="badge badge-primary">Новый</span>';
                         }elseif($row->status == 'reject'){
                            return '<span class="badge badge-danger">Отклонен</span>';
                         }else{
                            return '<span class="badge badge-success">Потвержден</span>';
                         }
                    })
                    ->filter(function ($instance) use ($request) {
                        if ($request->get('status') == 'new' || $request->get('status') == 'reject' || $request->get('status') == 'confirm') {
                            $instance->where('status', $request->get('status'));
                        }
                        if (!empty($request->get('search'))) {
                             $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->orWhere('name', 'LIKE', "%$search%")
                                ->orWhere('departure_city', 'LIKE', "%$search%")
                                ->orWhere('arrival_city', 'LIKE', "%$search%")
                                ->orWhere('phone', 'LIKE', "%$search%");
                            });
                        }
                    })
                    ->rawColumns(['status'])
                    ->make(true);
        }

        return view('dashboard.requests');
    }

     public function requestEdit($id)
    {
        $req = FlightRequest::FindOrFail($id);
        return view('dashboard.requestedit', compact('req'));
    }

    public function requestUpdate(Request $request, $id)
    {
        $req = FlightRequest::Find($id);
        //$user->name = $request->input('name');
        $req->status = $request->input('status');
        $req->result_comment = $request->input('result_comment');
    
        $req->update();
  
        return redirect("/dashboard/requests")->with('status', 'Заявка обновлен');
    }

     public function requestDelete(Request $request, $id)
    {
        $req = FlightRequest::FindOrFail($id);
        
    
        $req->delete();

        return redirect("/dashboard/requests")->with('status', 'Заявка удален');
    }

}
