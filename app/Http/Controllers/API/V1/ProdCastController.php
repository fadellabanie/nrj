<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Show;
use App\Models\Category;
use App\Models\Prodcast;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Shows\ShowCollection;
use App\Http\Resources\Prodcasts\CategoryResource;
use App\Http\Resources\Prodcasts\ProdcastCollection;

class ProdCastController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodcasts = Prodcast::with('presenter')->orderBy('id', 'desc')->paginate(50);

        return new ProdcastCollection($prodcasts);
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
