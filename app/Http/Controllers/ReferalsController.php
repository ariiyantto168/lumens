<?php

namespace App\Http\Controllers;
use App\Models\Referals;
use Illuminate\Http\Request;

class ReferalsController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $referal = Referals::all();
        return response($referal);       
    }

    public function create_page($referals)
    {
        $referal = Referals::where('idreferals', $referals)->get();
        return response($referal);
    }

    public function create_save(Request $request)
    {
        $saveReferals = new Referals;
        $saveReferals->name = $request->input('name');
        $saveReferals->code_referals = $request->input('code_referals');
        $saveReferals->description = $request->input('description');
        $saveReferals->save();
        return response('Success add Referals');
    }

    public function update_save(Request $request,$referals)
    {
        $updateReferals = Referals::where('idreferals', $referals)->first();
        $updateReferals->name = $request->input('name');
        $updateReferals->code_referals = $request->input('code_referals');
        $updateReferals->description = $request->input('description');
        $updateReferals->save();
        return response('Success updated Referals');
    }
}