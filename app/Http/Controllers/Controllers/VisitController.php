<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Visit;
use DateTime;
use Andegna;
use Auth;

class VisitController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('permission:visit-list|visit-create|visit-edit|visit-delete', ['only' => ['index','show']]);
        $this->middleware('permission:visit-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:visit-delete', ['only' => ['delete']]);
        $this->middleware('permission:visit-create', ['only' => ['create','store']]);
    }

    public function index()
    {
      
    	$visits = Visit::all();

    	return $visits;
    	
    }

    public function create()
    {
        $months = ["መስከረም","ጥቅምት","ህዳር","ታህሳስ","ጥር","የካቲት","መጋቢት","ሚያዚያ","ግንቦት","ሰኔ","ሀምሌ", "ነሐሴ"];

    	return view('visit.create', compact('months'));
    }

    public function store(Request $request)
    {
        
	   
        $validator = $request->validate(
            [
            'visitors' => 'required',
            'year'=>'required',
            'month'=>'required',
            'day'=>'required'
		    ],
            
            [
             'visitors.required' => 'እባኮ የእንግዶችን ስም ያስገቡ'
            ]
        );

         $visitors = "";

         $hasCar = 0;

         $plates = ""; 

         $status = 0; //Visit status, 0: NOT CHECKED IN, 1: CHECKED IN
        
        //Concatenate visitors names and Plate numbers with #
        /*
            *later will be exploded with # delimeter
        */
        foreach($request->visitors as $visitor)
        {
            $visitors .= "#";

            $visitors .=  $visitor;
        }

        if($request->hasCar=="on")
        {
            $hasCar = 1;

            if(isset($request->plates))
            {
                foreach($request->plates as $plate)
                {
                    $plates .= "#";

                    $plates .= $plate;
                }
            }
        }

        //Generate Access Code

        $randomNumber = mt_rand(100,999); //Random 3 digits

        $today = Carbon::now();
       
        $seconds = substr($today->timestamp, 8); //Seconds from time Stamp
        
        $accessCode = $randomNumber.$seconds; //concatenate randomNumber and Seconds

        //Create Ethiopian Date

        

        $ethiopianDate = Andegna\DateTimeFactory::of($request->year, $request->month,  $request->day);
       
        $date = $ethiopianDate->toGregorian();

        //phone number
        $contact_number = $request->contact_number;


        //Create New visit

        $visit = Visit::create([
            'requestor_id' => Auth::user()->id,
            'request_date' => $today,
            'visitor_list' => $visitors,
            'contact_number' => $contact_number,
            'visit_date'   => $date,
            'has_car'      => $hasCar,
            'code'         => $accessCode,
            'plates'       => $plates,
            'status'       => $status  
        ]);

        $visit->save();
        
        return redirect('/home');
    }

    public function edit(Request $request)
    {
       
        $visit = Visit::findorfail($request->id);

        $ethiopianDate = Andegna\DateTimeFactory::of($request->year, $request->month,  $request->day);
       
        $visit_date = $ethiopianDate->toGregorian();

        $visit->visit_date = $visit_date;
        
        $visit->contact_number = $request->contact_number;

        $visitors = "";

        $plates = "";

        foreach($request->visitors as $visitor)
        {
            $visitors .= "#";

            $visitors .=  $visitor;
        }

        $visit->visitor_list = $visitors;


        if(isset($request->plates))
        {
            
            $visit->has_car = 1;

            if(isset($request->plates))
            {
                foreach($request->plates as $plate)
                {
                    $plates .= "#";

                    $plates .= $plate;
                }
                
                $visit->plates = $plates;
            }

            
        }

        $visit->save();

        return redirect('/home');
    }

    public function delete ($id) {
        $visit = Visit::findorfail($id);
        $visit->delete();
        return redirect('/home')->with('success', 'መግቢያው ተሰርዙዋል');
            
    }    

}
