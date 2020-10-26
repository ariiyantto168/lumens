<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Str;
use Illuminate\Http\Request;
// use App\Models\Subclass;
use App\Models\Hilights;
// use App\Models\Materies;
use App\Models\Classes;
use App\Models\Categories;
// use Image;
// use File;

class ClassController extends Controller
{
    public function index()
    {
        $class = Classes::all();
        return response($class);
    }

    public function select_id($class)
    {   
        $classes = Classes::where('idclass',$class)->get();
        return response($classes);
    }
    
}
