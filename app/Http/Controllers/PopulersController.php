<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Populers;
use Image;
use File;


class PopulersController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index()
    {
        $pop = Populers::all();
        return response($pop);
    }

    public function select_id($populers)
    {
        $pop = Populers::where('idpopulers',$populers)->get();
        return response($pop);
    }


}
