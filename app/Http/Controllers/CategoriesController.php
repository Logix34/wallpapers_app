<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories= Category::orderBy('id','desc')->get();
       return view('categories.index',compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try{
            Category::create([
                'name' => $request->name,
            ]);
            Session::flash('success', 'Category Add Successfully!');
            return redirect()->back();

        }catch (\Exception $exception){
            Session::flash('error', 'Category Add failed!');
            return redirect()->back();

        }

    }

    public function edit($id)
    {
        return Category::find($id);
    }
    public function update(Request $request)
    {
        $data =  $request->validate([
            'name' => '',
        ]);


        try{
            $category = Category::find($request->category_id);
            $category->update($data);
            Session::flash('success', 'Category Has been Updated!');
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage() .' '.$exception->getLine());

        }

    }
    public function destroy($id)
    {
            $userCount=Category::find($id)->wallpapers->count();
            if($userCount > 0){
                Session::flash('error', 'Category has ' . $userCount . ' wallpapers');
                return redirect()->back();
            }else{
                Category::whereId($id)->delete();
                Session::flash('success', 'Category has been Deleted');
                return redirect()->back();
            }

    }

}
