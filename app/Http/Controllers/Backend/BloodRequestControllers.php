<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Role;
use App\Models\Admin\Blood;
use App\Models\Admin\Slider;
use App\Models\Admin\Division;
use App\Models\Admin\District;
use App\Models\Admin\Thana;
use App\Models\Admin\Area;
use App\Models\Admin\Postcode;
use App\Models\Admin\Website;
use App\Models\Frontend\BloodRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BloodRequestControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $website = Website::latest()->first();
        $bloodrequests = BloodRequest::where('status', '0')->orderBy('id', 'DESC')->get();
        return view('backend.pages.bloodrequest.index', compact('bloodrequests', 'website'));
    }

    // pending request------------------
    public function approverequest()
    {
        $website = Website::latest()->first();
        $bloodrequests = BloodRequest::where('status', '1')->orderBy('id', 'DESC')->get();
        return view('backend.pages.bloodrequest.index', compact('bloodrequests', 'website'));
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
        $blood_details = DB::table('blood_requests')->where('id', $id)->first();
        return view('backend.pages.bloodrequest.requestview', compact('blood_details', 'website'));
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

    // Change blood request activity--------------
    public function bloodrequest_activity(Request $request)
    {
        // return $request->user_id;
        $user = BloodRequest::find($request->request_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old_img = DB::table('blood_requests')->where('id', $id)->first();
        $old_img_path = $old_img->report_image;
        if($old_img_path){
            unlink($old_img_path);
            $delete = DB::table('blood_requests')->where('id', $id)->delete();
            if($delete){
                return redirect()->route('admin.bloodrequest')->with('message','Bloodrequest deleted Successfully!');
            }else{
                return redirect()->route('admin.bloodrequest')->with('error','Have some errors!!');
            }
        }else{
            $delete = DB::table('blood_requests')->where('id', $id)->delete();

            if($delete){
                return redirect()->route('admin.bloodrequest')->with('message','Bloodrequest deleted Successfully!');
            }else{
                return redirect()->route('admin.bloodrequest')->with('error','Have some errors!!');
            }
        }
    }
}
