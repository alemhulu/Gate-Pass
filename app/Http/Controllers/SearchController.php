<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyUsersChart;
use Illuminate\Http\Request;
use Illuminate\Http\DB;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Visit;
use phpDocumentor\Reflection\Types\Compound;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function search(Request $request)
    {
       
        $search=$request->get('search');
        $visits=\DB::table('visits')->where('code','like','%'.$search.'%')->paginate(5);
        return view('visit.index',['visits'=>$visits]);
    }
}
