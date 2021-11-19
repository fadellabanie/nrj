<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Videos\VideoCollection;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderByDesc('id')->get();

        return new VideoCollection($videos);
    }
 
}
