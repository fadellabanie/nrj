<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Category;
use App\Models\MusicBasket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Prodcasts\CategoryResource;
use App\Http\Resources\MusicBaskets\MusicBasketCollection;



class MusicBasketController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategory()
    {
        $categories = Category::get();

        return  CategoryResource::Collection($categories);
    } 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $musicBaskets = MusicBasket::where('category_id',$request->category_id)->get();

        return new MusicBasketCollection($musicBaskets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
