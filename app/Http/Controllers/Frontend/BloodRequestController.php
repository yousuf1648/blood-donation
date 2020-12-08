<?php

namespace App\Http\Controllers\Frontend;

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

class BloodRequestController extends Controller
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
        $bloods = Blood::all();
        $areas = Area::all();
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

        return view('frontend.pages.bloodrequest', compact('donors', 'bloods', 'areas', 'website', 'slider', 'activedonorcount', 'bloodrequestcount'));
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
        $validatedData = $request->validate([
            'patient_name' => 'required|max:100|min:3',
            'patient_age' => 'required',
            'patient_gender' => 'required',
            'blood_group' => 'required',
            'blood_bag' => 'required',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'hospital_area' => 'required',
            'blood_needed_date' => 'required',
            'blood_needed_time' => 'required',
            'patient_relative' => 'required',
            'patient_relative_contact' => 'required',
            'reason_for_blood' => 'required',
            'report_image' => 'required',
        ]);

        $bloodrequestId = BloodRequest::latest('id')->first();
        $id = null;
        if(empty($bloodrequestId->id)){
            $id='100001';
        }else{
            $id = $bloodrequestId->id+1;
        }

        $bloodrequest = new BloodRequest();

        $bloodrequest->id = $id;
        $bloodrequest->patient_name = $request->input('patient_name');
        $bloodrequest->patient_age = $request->input('patient_age');
        $bloodrequest->patient_gender = $request->input('patient_gender');
        $bloodrequest->blood_group = $request->input('blood_group');
        $bloodrequest->blood_bag = $request->input('blood_bag');
        $bloodrequest->hospital_name = $request->input('hospital_name');
        $bloodrequest->hospital_address = $request->input('hospital_address');
        $bloodrequest->hospital_area = $request->input('hospital_area');
        $bloodrequest->blood_needed_date = $request->input('blood_needed_date');
        $bloodrequest->blood_needed_time = $request->input('blood_needed_time');
        $bloodrequest->patient_relative = $request->input('patient_relative');
        $bloodrequest->patient_relative_contact = $request->input('patient_relative_contact');
        $bloodrequest->reason_for_blood = $request->input('reason_for_blood');
        $bloodrequest->status = '0';

        // return $jfh = strtotime($bloodrequest->blood_needed_time);

        // return $bloodrequest;

        $image = $request->file('report_image');
        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'frontend/img/bloodrequest/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $bloodrequest->report_image = $image_url;
                $slider_insert = $bloodrequest->save();
                if ($slider_insert) {
                    $request->session()->put('message', "Request send successfully!");
                    return redirect()->route('blood.request.confirm');
                }else{
                    $senderror = "Request dose not send successfully!";
                    return redirect()->route('blood.request')->with($senderror);
                }
            }else{
                $imgerror = "Image Uploading Problem";
                return redirect()->route('blood.request')->with($imgerror);
            }
        }
    }

    public function request_confirm()
    {
        $website = Website::latest()->first();
        $slider = Slider::latest()->first();
        $bloods = Blood::all();
        $areas = Area::all();
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

        return view('frontend.pages.bloodrequestconfirm', compact('donors', 'bloods', 'areas', 'website', 'slider', 'activedonorcount', 'bloodrequestcount'));
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
