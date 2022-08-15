<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Visit;
use DateTime;
use Andegna;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\QrCodeBuilder;

class VisitController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('permission:visit-list|visit-create|visit-edit|visit-delete', ['only' => ['index','show']]);
    //     $this->middleware('permission:visit-edit', ['only' => ['edit','update']]);
    //     $this->middleware('permission:visit-delete', ['only' => ['delete']]);
    //     $this->middleware('permission:visit-create', ['only' => ['create','store']]);
    // }

    public function index()
    {
        $visits = Visit::latest('updated_at')->get();
        return view('visit.index', compact('visits'));
    }

    public function create()
    {
        $months = ["መስከረም", "ጥቅምት", "ህዳር", "ታህሳስ", "ጥር", "የካቲት", "መጋቢት", "ሚያዚያ", "ግንቦት", "ሰኔ", "ሐምሌ", "ነሐሴ"];
        return view('visit.create', compact('months'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                'visitors' => 'required',
                'year' => 'required',
                'month' => 'required',
                'day' => 'required',
                'email' => 'required|email|unique:users,email',
                'plates'=>'nullable'

            ],

            [
                'visitors.required' => 'please enter the visitor name/እባኮ የእንግዶችን ስም ያስገቡ'
            ]
        );

        //  $visitors = "";
        // $hasCar = 0;

        $plates = "";
        // $status = 0; //Visit status, 0: NOT CHECKED IN, 1: CHECKED IN
        // //Concatenate visitors names and Plate numbers with #
        // /*
        //     *later will be exploded with # delimeter
        // */
        // foreach($request->visitors as $visitor)
        // {
        //     $visitors .= "#";

        //     $visitors .=  $visitor;
        // }

        if ($request->has_car == 1) {
            $hasCar = 1;

            // if (isset($request->plates)) {
            //     foreach ($request->plates as $plate) {
            //         $plates .= "#";

            //         $plates .= $plate;
            //     }
            // }
        }
        
        if ($request->has_car == null) {
            $hasCar = 0;
        }

        //Generate Access Code
        $randomNumber = mt_rand(100, 999); //Random 3 digits
        $today = Carbon::now();
        $seconds = substr($today->timestamp, 8); //Seconds from time Stamp
        $accessCode = $randomNumber . $seconds; //concatenate randomNumber and Seconds

        //Create Ethiopian Date
        $ethiopianDate = Andegna\DateTimeFactory::of($request->year, $request->month,  $request->day);
        $date = $ethiopianDate->toGregorian();

        $time = time();

        // create a folder
        if(!\File::exists(public_path('images'))) {
            \File::makeDirectory(public_path('images'), $mode = 0777, true, true);
        }

        $qrcode = QrCode::size(400)->generate($accessCode, 'images/'.$time.'.svg');
        $qr_image = '/images/'.$time.'.svg';

        //Create New visit
        $visit = Visit::create([
            'requestor_id' => FacadesAuth::user()->id,
            'request_date' => $today,
            'visitor_list' => $request->visitors,
            'email' => $request->email,
            'visit_date'   => $date,
            'has_car'      => $hasCar,
            'code'         => $accessCode,
            'plates'       => $request->plates,
            'qr_image' => $qr_image,
            'status'       => 0,
        ]);


        $visit->save();

        return redirect(route('visits.index'));
    }


    public function edit($id)
    {
             
        $months = ["መስከረም","ጥቅምት","ህዳር","ታህሳስ","ጥር","የካቲት","መጋቢት","ሚያዚያ","ግንቦት","ሰኔ","ሐምሌ", "ነሐሴ"];
        $visit = Visit::findorFail($id);
        $gregorian = new DateTime($visit->visit_date);
        $visitDate = new Andegna\DateTime($gregorian);
         $year = $visitDate->getYear();   
         $month = $visitDate->getMonth();  
         $day = $visitDate->getDay();  

        return view('visit.edit',compact('visit','months','year','month','day'));
    }


    // public function update(Request $request)

    // {

    //     $visit = Visit::findorfail($id);

    //     $months = ["መስከረም", "ጥቅምት", "ህዳር", "ታህሳስ", "ጥር", "የካቲት", "መጋቢት", "ሚያዚያ", "ግንቦት", "ሰኔ", "ሐምሌ", "ነሐሴ"];

    //     return view('visit.edit', compact('months','visit'));
    // }

    public function update(Request $request, $id)
    {
        $visit = Visit::findorfail($id);

        $ethiopianDate = Andegna\DateTimeFactory::of($request->year, $request->month,  $request->day);
        $date = $ethiopianDate->toGregorian();
        $visit_date = $date;

        $hasCar = 0;
        $visitors = "";
        $plates = "";
        
        $visit->visitor_list = $request->visitors;
        $visit->email = $request->email;
        $visit->visit_date = $visit_date;
        $visit->has_car = $hasCar;
        $visit->plates = $request->plates;
       
        $visit->save();

        return redirect(route('visits.index'))->with('success', 'The visit has been updated/መግቢያው ተስተካክሏል');;
    }

    public function destroy($id)
    {

        $visit = Visit::findorfail($id);
        $visit->delete();
        return back()->with('success', 'The visit has been deleted/መግቢያው ተሰርዙዋል');
    }
}
