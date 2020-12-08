<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Slider;
use App\Models\Admin\Website;
use App\Models\Frontend\BloodRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontBlogController extends Controller
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

        $blogs = Blog::where('status', '1')->orderBy('id', 'DESC')->get();

        return view('frontend.pages.blog', compact('blogs', 'donors', 'website', 'slider', 'activedonorcount','bloodrequestcount'));
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

        $blog = DB::table('blogs')->where('id', $id)->first();

        return view('frontend.pages.blogdetails', compact('blog', 'donors', 'website', 'slider', 'activedonorcount','bloodrequestcount'));
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
