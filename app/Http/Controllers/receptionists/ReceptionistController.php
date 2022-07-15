<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;

class ReceptionistController extends Controller
{

    public function index()
    {
        return view('receptionists.receptionist.index');
    }

}
