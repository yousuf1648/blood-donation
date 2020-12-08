<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Area;
use Illuminate\Http\Request;
use App\Models\Admin\Role;
use App\Models\Admin\Blood;
use App\Models\Admin\Postcode;
use App\Models\Admin\Slider;
use App\Models\Admin\Thana;
use App\Models\Admin\Website;
use App\Models\Frontend\BloodRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BloodNeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $website = Website::latest()->first();
        $slider = Slider::latest()->first();
        $donors = DB::table('users')
                ->where('is_donor', '1')
                ->get()->sortBy("id");
        $activedonors = DB::table('users')
                ->where('is_donor', '1')
                ->where('status', '1')
                ->get()->sortBy("id");
        $activedonorcount = $activedonors->count();

        $bloodrequest = BloodRequest::all();
        $bloodrequestcount = $bloodrequest->count();

        return view('frontend.pages.bloodneed', compact('donors', 'website', 'slider', 'activedonorcount','bloodrequestcount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
