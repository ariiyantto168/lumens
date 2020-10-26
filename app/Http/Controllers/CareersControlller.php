<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Careers;
use Image;
use File;

class CareersControlller extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $car = Careers::all();
        return response($car);
    }

    public function select_id($careers)
    {
        $car = Careers::where('idcareers',$careers)->get();
        return response($car);
    }

    
}
