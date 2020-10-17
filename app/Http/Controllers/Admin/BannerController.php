<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BackendController;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;

class BannerController extends BackendController
{
    /**
     * ShopController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->data['sitetitle'] = 'Banners';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banner.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['banners'] = Banner::orderBy('id', 'desc')->get();
        return view('admin.banner.create', $this->data);
    }

    /**
     * @param BannerRequest $request
     * @return mixed
     */
    public function store(BannerRequest $request)
    {
        $banner                = new Banner;
        $banner->name          = $request->name;
        $banner->save();
        error_log($banner);
        //Store Image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $banner->addMediaFromRequest('image')->toMediaCollection('banners');
        }

        return redirect(route('admin.banner.index'))->withSuccess('The Data Inserted Successfully');
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['banner'] = Banner::findOrFail($id);
        return view('admin.banner.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $banner                = Banner::findOrFail($id);
        $banner->name          = $request->name;
        $banner->save();

        //Store Image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $z = $banner->addMediaFromRequest('image')->toMediaCollection('banners');
        }

        return redirect(route('admin.banner.index'))->withSuccess('The Data Inserted Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::findOrFail($id)->delete();
        return redirect(route('admin.banner.index'))->withSuccess('The Data Deleted Successfully');
    }

    public function getBanner(Request $request)
    {
        if (request()->ajax()) {
            $banners = Banner::orderBy('id', 'desc')->get();

            $i             = 1;
            $bannersArray = [];
            if (!blank($banners)) {
                foreach ($banners as $banner) {
                    $bannersArray[$i]          = $banner;
                    $bannersArray[$i]['setID'] = $i;
                    $i++;
                }
            }
            return Datatables::of($bannersArray)
                ->addColumn('image', function ($banner) {
                    if ($banner->getFirstMediaUrl('banners')) {
                        return '<img alt="image" src="' . asset($banner->getFirstMediaUrl('banners')) . '" class="rounded-circle mr-1 avatar-item">';
                    } else {
                        return '<img alt="image" src="' . asset('assets/img/default/banner.png') . '" class="rounded-circle mr-1 avatar-item">';
                    }
                })
                ->addColumn('action', function ($banner) {
                    return '<a href="' . route('admin.banner.edit', $banner) . '" class="btn btn-sm btn-icon float-left btn-primary"><i class="far fa-edit"></i></a><form class="float-left pl-2" action="' . route('admin.banner.destroy', $banner) . '" method="POST">' . method_field('DELETE') . csrf_field() . '<button class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash"></i></button></form>';
                })
                ->editColumn('id', function ($banner) {
                    return $banner->setID;
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
    }
}