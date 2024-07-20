<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wallpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WallpaperController extends Controller
{

    public function index()
    {
        $categories=Category::get();
        $wallpapers = Wallpaper::with('category')->orderBy('id','desc')->get();
        return view('categories.wallpaper',compact('categories','wallpapers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'category_id'=>'required',
            'wallpaper_image' => 'required'
        ]);
        if($request->hasFile('wallpaper_image')){
            $wallpaper_image = $request->file('wallpaper_image');
            $fileName =  time().'-'.$wallpaper_image->getClientOriginalName();
            $wallpaper_image->move('assets/uploads', $fileName);
            $wallpaper_image_path = 'assets/uploads/'.$fileName;
        }

        try{
            $wal=Wallpaper::create([
                'category_id' => $request['category_id'],
                'title' => $request['title'],
                'wallpaper_image' =>$wallpaper_image_path,
            ]);

            if($wal)
            {
                Session::flash('success', 'Wallpaper Added Successfully!');
                return redirect()->back();
            }
            else
            {
                Session::flash('error', 'Something went wrong!');
                return redirect()->back();
            }
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage() .' '.$exception->getLine());

        }
    }

    public function edit($id)
    {
        return Wallpaper::find($id);
    }


    public function update(Request $request, Wallpaper $wallpaper)
    {
        $data =  $request->validate([
            'title' => 'required',
            'wallpaper_image' => '',
            'category_id' => 'required'
        ]);

        if($request->hasFile('wallpaper_image')){
            $wallpaper_image = $request->file('wallpaper_image');
            $fileName =  time().'-'.$wallpaper_image->getClientOriginalName();
            $wallpaper_image->move('assets/uploads', $fileName);
            $wallpaper_image_path = 'assets/uploads/'.$fileName;
        }

        try{
            $category = Wallpaper::find($request->wallpaper_id);

            $data['wallpaper_image'] =isset($wallpaper_image_path)?$wallpaper_image_path:$category->wallpaper_image;
            $category->update($data);
            return redirect()->back()->with('success', 'Wallpaper Has been Updated' );
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage() .' '.$exception->getLine());

        }
    }
    public function destroy($id)
    {
        try{
            $wallpaper = Wallpaper::find($id);
            $wallpaper->delete();
            return redirect()->back()->with('success', 'Wallpaper Has been deleted' );

        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage() .' '.$exception->getLine());

        }

    }
}
