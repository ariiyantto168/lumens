<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Subclass;
use App\Models\Classes;


class SubclassController extends Controller
{
    public function index()
    {
        $subclas = Subclass::all();
        return response($subclas);
    }

    public function select_id($subclass)
    {   
        $sub = Subclass::where('idsubclass',$subclass)->get();
        return response($sub);
    }

    public function select_class(Classes $classes, Subclass $subclass)
    {


    }
    
    
}
