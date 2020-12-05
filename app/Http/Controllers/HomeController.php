<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Website;
use App\Models\Admin\Slider;
use App\Models\Frontend\BloodRequest;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $website = Website::latest()->first();
        // return $website;
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

        $approvebloodrequests = BloodRequest::where('status', '1')->get();


        return view('frontend.pages.index', compact('website', 'slider', 'activedonorcount', 'approvebloodrequests', 'donors', 'bloodrequestcount'));
    }
}
