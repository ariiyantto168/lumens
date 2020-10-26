<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
// use App\Models\Materies;

class CommentsController extends Controller
{

    public function index (){
        $dataComments = Comments::all();
        return response($dataComments);
    }

    public function select_id($comments){
        $comen = Comments::where('idcomments',$comments)->get();
        return response($comen);
    }

    public function create_save(Request $request){
        $commentSave = new Comments;
        $commentSave->namecomments = $request->input('namecomments');
        $commentSave->save();
        return 'Success add comments';
    }

    public function update_save(Request $request,$comments)
    {
        $updateComments = Comments::where('idcomments', $comments)->first();
        $updateComments->namecomments = $request->input('namecomments');
        $updateComments->save();
        return response('Success update comments');
    }

    public function delete($comments)
    {
        $deleteComments = Comments::where('idcomments',$comments)->first();
        $deleteComments->delete();
        return response('Success Deleted Comments');
    }

}
