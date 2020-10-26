<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Hilights;
use App\Models\Classes;


class HilightsController extends Controller
{
    public function index()
    {
        $hiligts = Hilights::all();
        return response($hiligts);
    }

    public function select_id($hilights)
    {   
        $hilights = Hilights::where('idhilights',$hilights)->get();
        return response($hilights);
    }
    
    
}
