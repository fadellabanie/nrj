<?php

namespace App\Http\Controllers\API\V1;

use App\Models\AppSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Constants\AppSettingResource;
use App\Models\Member;
use App\Models\User;

class HomeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
       Member::create([
        'device_token'=> $request->device_token,
        'device_id'=> $request->device_id,
       ]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $appSetting = AppSetting::get();
        $data['app_setting'] = AppSettingResource::collection($appSetting);

        return $this->respondWithCollection($data);
    }

}
