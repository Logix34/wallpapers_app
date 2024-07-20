<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Wallpaper;
use Illuminate\Http\Request;

class WallpaperController extends Controller
{

    public function index()
    {

        $wallpapers=Category::with(['wallpapers' => function($query) {
            $query->inRandomOrder();
                }])->limit(4)->get();
        return response()->json([
            'status'=>'success',
            'data'=>$wallpapers
        ]);
    }

    public function wallpapersByCategory(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'parent_id' => 'required|exists:categories,id'

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ]);
        } else {
            $category = Category::find($request->parent_id);
            $wallpapersByParent = $category->wallpapers;
            return response()->json([
                'status' => 'success',
                'data' => $wallpapersByParent
            ]);
        }
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
