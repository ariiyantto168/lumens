<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Newclass;


class NewclassController extends Controller
{
    public function index()
    {
        $nclass = Newclass::all();
        return response($nclass);
    }

    public function select_id($newclass)
    {   
        $nclass = Newclass::where('idnewclass',$newclass)->get();
        return response($nclass);
    }
    
}
