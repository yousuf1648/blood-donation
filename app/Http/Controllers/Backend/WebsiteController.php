<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Website;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $website = Website::latest()->first();
        return view('backend.pages.website.editwebsite',compact('website'));
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
    public function update(Request $request, $id, Website $website)
    {
        $this->validate($request,[
            'title' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $data = array();

        // get form favicon
        $favicon = $request->file('favicon');
        if (isset($favicon))
        {
            $favicon_name = Str::random(20);
            $ext = strtolower($favicon->getClientOriginalExtension());
            $favicon_full_name = $favicon_name.'.'.$ext;
            $upload_path = 'backend/img/website/';
            $favicon_url = $upload_path.$favicon_full_name;
            $success = $favicon->move($upload_path, $favicon_full_name);

            if ($success) {
                $fav_icon = $favicon_url;
                $old_img = DB::table('websites')->where('id', $id)->first();
                $old_img_path = $old_img->favicon;
                // $old_img_dlt = unlink($old_img_path);
                if($old_img_path){
                    unlink($old_img_path);
                    $fav_icon = $favicon_url;
                    $data['favicon'] = $fav_icon;
                }else{
                    $fav_icon = $favicon_url;
                    $data['favicon'] = $fav_icon;
                }
            }
        }

        // for logo
        $logo = $request->file('logo');
        $slug_1 = 'logo';
        if (isset($logo))
        {
            $favicon_name = Str::random(20);
            $ext = strtolower($logo->getClientOriginalExtension());
            $logo_full_name = $favicon_name.'.'.$ext;
            $upload_path = 'backend/img/website/';
            $logo_url = $upload_path.$logo_full_name;
            $success = $logo->move($upload_path, $logo_full_name);

            if ($success) {
                $logo_image = $logo_url;
                $old_img = DB::table('websites')->where('id', $id)->first();
                $old_img_path = $old_img->logo;
                // $old_img_dlt = unlink($old_img_path);
                if($old_img_path){
                    unlink($old_img_path);
                    $logo_image = $logo_url;
                    $data['logo'] = $logo_image;
                }else{
                    $logo_image = $logo_url;
                    $data['logo'] = $logo_image;
                }
            }
        }

        $icon =trim(implode("|",$request->icon),"|");
        $link =trim(implode("|",$request->link),"|");

        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_tag'] = $request->meta_tag;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['twitter_api'] = $request->twitter_api;
        $data['google_map'] = $request->google_map;
        $data['icon'] = $icon;
        $data['link'] = $link;

        $update_result = DB::table('websites')->where('id', $id)->update($data);

        if($update_result){
            return redirect()->back()->with('message','Website info upadated Successfully!');
        }else{
             return redirect()->back()->with('error','Website info dose not upadated Successfully!');
        }

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
