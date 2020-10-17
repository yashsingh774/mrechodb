<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;
use App\Http\Resources\v1\BannerResource;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    /**
     * @return BannerResource
     */
    public function index( Request $request )
    {

        $banners = Banner::orderBy('id', 'desc')->get();
        if (!blank($banners)) {
            return response()->json([
                'status' => 200,
                'data'   => new BannerResource($banners),
            ]);
        }
        return response()->json([
            'status'  => 404,
            'message' => 'The data not found',
        ]);
    }
}