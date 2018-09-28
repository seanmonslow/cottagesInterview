<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\properties;
use App\locations;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    function index(){
    	$properties = properties::paginate(5);
    	return view('welcome', ["properties"=>$properties]);
    }

    function search(Request $request){

        $properties = new properties;

        if($request->input('location') != ""){
            $location = $request->input('location');
            if($request->input("accuracy") == "exact"){
                $properties = $properties->whereHas('location', function($q) use ($location){
                    $q->where('location_name', '=', $location);
                });
            } else {
                $properties = $properties->whereHas('location', function($q) use ($location){
                    $q->where('location_name', 'LIKE', '%'.$location.'%');
                });
            }
        }

        if($request->input('date') != ""){
            //print_r($request->input('date'));
            $date = $request->input('date');

            $properties = $properties->whereHas('bookings', function($q) use ($date){
                     $q->where([['start_date', '<', $date], ['end_date', '>', $date]]);
                }, "<=", 0);

            /*$properties->whereHas('bookings', function($q) use ($date){

                //print_r($date);

                $q->where([['start_date', '<', "'".$date."'"], ['end_date', '>', "'".$date."'"]]);

            }, "<=", 0);*/
        };

    	if($request->input('near_beach') != ""){
            $properties = $properties->where('near_beach', '=', $request->input('near_beach'));
    	}

    	if($request->input('accept_pets') == "1"){
            $properties = $properties->where('accepet_pets', '=', $request->input('accept_pets'));
    	}

    	if($request->input('sleeps') != ""){
            $properties = $properties->where('sleeps', '>=', $request->input('sleeps'));
    	}

    	if($request->input('beds') != ""){
            $properties = $properties->where('beds', '>=', $request->input('beds'));
    	}

        $properties = $properties->paginate(5);

        return view('welcome', ["properties"=>$properties]);
    }

}
