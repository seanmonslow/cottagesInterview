<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\properties;

class SearchController extends Controller
{
    function index(){
    	$properties = properties::paginate(5);
    	return view('welcome', ["properties"=>$properties]);
    }

    function search(Request $request){
    	$whereConditions = [];

    	if($request->input('near_beach') != ""){
    		$whereConditions[] = ['near_beach', '=', $request->input('near_beach')];
    	}

    	if($request->input('accept_pets') != ""){
    		$whereConditions[] = ['accept_pets', '=', $request->input('accept_pets')];
    	}

    	if($request->input('sleeps') != ""){
    		$whereConditions[] = ['sleeps', '>=', $request->input('sleeps')];
    	}

    	if($request->input('beds') != ""){
    		$whereConditions[] = ['beds', '>=', $request->input('beds')];
    	}
    	
    	if($request->input('location') != ""){
    		if($request->input("accuracy") == "exact"){
    			$whereConditions[] = ['column_1', '=', 'value_1']
    		} else {

    		}
    	} else {
    		
    	}
    }

}
