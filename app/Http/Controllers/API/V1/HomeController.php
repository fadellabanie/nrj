<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use App\Models\Member;
use App\Models\AppSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Constants\AdsResource;
use App\Http\Resources\Constants\AppSettingResource;
use App\Models\Ads;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $member = Member::where([
            'device_id' => $request->device_id,
        ])->first();

        if ($member) return $this->errorStatus(__("user is login before"));

        Member::create([
            'device_token' => $request->device_token,
            'device_id' => $request->device_id,
            'ip' => $request->ip(),
            'type' => $request->type,
        ]);

        return $this->successStatus(__("login successfully"));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $appSetting = AppSetting::get();
        $ads = Ads::inRandomOrder()->take(1)->first();

        $data['app_setting'] = AppSettingResource::collection($appSetting);
        $data['ads'] = new AdsResource($ads);

        return $this->respondWithCollection($data);
    }
}
