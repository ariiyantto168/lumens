<?php

namespace App\Http\Controllers;
use App\Models\Testimonies;
use Illuminate\Http\Request;

class TestimoniesController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $testimonies = Testimonies::all();
        return response($testimonies);       
    }

    public function create_page($testimonies)
    {
        $testimonies = Testimonies::where('idtestimonies', $testimonies)->get();
        return response($testimonies);
    }

    public function create_save(Request $request)
    {
        $saveTestimonies = new Testimonies;
        $saveTestimonies->name = $request->input('name');
        $saveTestimonies->jobrole = $request->input('jobrole');
        $saveTestimonies->description = $request->input('description');
        $saveTestimonies->save();
        return response('Success add Testimonies class');
    }

    public function update_save(Request $request,$testimonies)
    {
        $updateTestimonies = Testimonies::where('idtestimonies', $testimonies)->first();
        $updateTestimonies->name = $request->input('name');
        $updateTestimonies->jobrole = $request->input('jobrole');
        $updateTestimonies->description = $request->input('description');
        $updateTestimonies->save();
        return response('Success add Testimonies class');
    }

    public function delete($testimonies)
    {
        $deleteTestimonies = Testimonies::where('idtestimonies',$testimonies)->first();
        $deleteTestimonies->delete();
        return response('Success Deleted Testimonies Users');
    }
}