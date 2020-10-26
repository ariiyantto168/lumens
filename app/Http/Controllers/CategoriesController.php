<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    
    public function __construct()
    {
        //
    }

    public function index()
    {
        $categories = Categories::all();
        return response($categories);       
    }

    public function create_page($idcategories)
    {   
        $categories = Categories::where('idcategories',$idcategories)->get();
        return response($categories);
    }

    public function create_save(Request $request)
    {
        $saveCategories = new Categories();
        $saveCategories->name = $request->input('name');
        $saveCategories->save();
        return response('Succes menambahkan data Categories');
    }

    public function update_save(Request $request,$idcategories)
    {
        $saveCategories = Categories::where('idcategories',$idcategories)->first();;
        $saveCategories->name = $request->input('name');
        $saveCategories->save();
        return response('Succes Updated Categories');
    }

    public function delete($idcategories)
    {
        $deleteCategories = Categories::find($idcategories);
        $deleteCategories->delete();

        return response('Succes Deleted Categories');
    }

   
}
