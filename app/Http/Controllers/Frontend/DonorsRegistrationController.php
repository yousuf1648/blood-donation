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

class DonorsRegistrationController extends Controller
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

        return view('frontend.pages.donorregistration', compact('donors', 'website', 'slider', 'activedonorcount','bloodrequestcount'));
    }

    //  Before registration stage------------------------------------------------------------------
    public function registration_first_stage(Request $request){

        $validatedData = $request->validate([
            'weight' => 'required',
            'age' => 'required',
            'height' => 'required',
            'disease' => 'min:0|max:0',
            'smoker' => 'required',
            'marital_status' => 'required',
        ]);

        if ($request->input('weight') <= '51' || $request->input('weight') >= '90') {
            $valid_weight = "Weight is not valid for register!";
            return redirect()->route('donor.registration', compact('valid_weight'));
        }elseif($request->input('age') <= '18' || $request->input('age') >= '40'){
            $valid_age = "Age is not valid for register!";
            return redirect()->route('donor.registration', compact('valid_age'));
        }else{
            // $data = array();
            // $data['weight'] = $request->input('weight');
            // $data['age'] = $request->input('age');
            // $data['height'] = $request->input('height');
            // $data['disease'] = "না";
            // $data['smoker'] = $request->input('smoker');
            // $data['marital_status'] = $request->input('marital_status');

            $request->session()->put('weight', $request->input('weight'));
            $request->session()->put('age', $request->input('age'));
            $request->session()->put('height', $request->input('height'));
            $request->session()->put('disease', 'না');
            $request->session()->put('smoker', $request->input('smoker'));
            $request->session()->put('marital_status', $request->input('marital_status'));

            // return $data;
            return redirect()->route('donor.donorregistrationfinal');

            // if(!empty($data)){
            //     return redirect()->route('donor.donorregistrationfinal');
            // }else{
            //     return redirect()->route('donor.registration')->with('error','Data not save!');
            // }
        }

    }

    // route to final registration---------------
    public function donorregistrationfinal(){
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
        return view('frontend.pages.donorregistrationfinal', compact('donors', 'website', 'slider', 'activedonorcount'));
    }

    // get poost code---------------------
    public function donor_postcode(Request $request){
        $thana_id = $request->thana_id;

        if (!$thana_id) {
            $html = '<option value="">'.'--- নির্বাচন করুন ---'.'</option>';
        } else {
            $html = '';
            $postcodes = Postcode::where('thana_id',$thana_id)->get();
            foreach ($postcodes as $postcode) {
                $html .= '<option value="'.$postcode->id.'">'.$postcode->post_code.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }

    // get area against thana name-----------------
    public function donor_area(Request $request)
    {
        $thana_id = $request->thana_id;

        if (!$thana_id) {
            $html = '<option value="">'.'--- নির্বাচন করুন ---'.'</option>';
        } else {
            $html = '';
            $areas = Area::where('thana_id',$thana_id)->get();
            foreach ($areas as $area) {
                $html .= '<option value="'.$area->id.'">'.$area->area_name.'</option>';
            }
        }

        return response()->json(['html' => $html]);
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
            'name'              => 'required|min:3|max:50',
            'blood_group'       => 'required',
            'birthday'          => 'required',
            'gender'            => 'required',
            'last_donate'       => 'required',
            'first_mobile'      => 'required|unique:users',
            'thana'             => 'required',
            'post_code'         => 'required',
            'area'              => 'required',
            'present_address'   => 'required',
            'permanent_address' => 'required',
            'username'          => 'required|unique:users|min:3|max:50',
            'email'             => 'required|unique:users',
            'password'          => 'required',
        ]);

        $data = array();

        $data['role_id']            = '3';
        $data['is_donor']           = '1';
        $data['name']               = Str::ucfirst($request->input('name'));
        $data['username']           = $request->input('username');
        $data['email']              = $request->input('email');
        $data['password']           = Hash::make($request->input('password'));

        $data['weight']             = $request->input('weight');
        $data['age']                = $request->input('age');
        $data['height']             = $request->input('height');
        $data['disease']            = $request->input('disease');
        $data['smoker']             = $request->input('smoker');
        $data['marital_status']     = $request->input('marital_status');

        $data['blood_group']        = $request->input('blood_group');
        $data['birthday']           = $request->input('birthday');
        $data['gender']             = $request->input('gender');
        $data['present_address']    = $request->input('present_address');
        $data['permanent_address']  = $request->input('permanent_address');

        $data['thana']              = $request->input('thana');
        $data['area']               = $request->input('area');
        $data['post_code']          = $request->input('post_code');

        // For First mobile number-----------------------------------------------------------------------
        if(!empty($request->input('first_mobile'))){
            $plen = strlen($request->input('first_mobile'));
            if($plen >= '11' && $plen <= '14'){
                $p1 = substr($request->input('first_mobile'), 0, 2);
                $p2 = substr($request->input('first_mobile'), 0, 4);
                $p3 = substr($request->input('first_mobile'), 0, 5);
                if($p1 == '01'){
                    $data['first_mobile'] = $request->input('first_mobile');
                }elseif($p2 == '8801'){
                    $data['first_mobile'] = $request->input('first_mobile');
                }elseif($p3 == '+8801'){
                    $data['first_mobile'] = $request->input('first_mobile');
                }else{
                    $valid_f_number = "Phone number is not valide!";
                    return redirect()->route('donor.donorregistrationfinal', compact('valid_f_number'));
                }
            }else{
                $valid_number = "Phone number is must be 13 character!";
                return redirect()->route('donor.donorregistrationfinal', compact('valid_number'));
            }
        }

        // For First mobile number-----------------------------------------------------------------------
        if(!empty($request->input('second_mobile'))){
            $plen = strlen($request->input('second_mobile'));
            if($plen >= '11' && $plen <= '14'){
                $p1 = substr($request->input('second_mobile'), 0, 2);
                $p2 = substr($request->input('second_mobile'), 0, 4);
                $p3 = substr($request->input('second_mobile'), 0, 5);
                if($p1 == '01'){
                    $data['second_mobile'] = $request->input('second_mobile');
                }elseif($p2 == '8801'){
                    $data['second_mobile'] = $request->input('second_mobile');
                }elseif($p3 == '+8801'){
                    $data['second_mobile'] = $request->input('second_mobile');
                }else{
                    $valid_s_number = "Phone number is not valide!";
                    return redirect()->route('donor.donorregistrationfinal', compact('valid_s_number'));
                }
            }else{
                $valid_number = "Phone number is must be 13 character!";
                return redirect()->route('donor.donorregistrationfinal', compact('valid_number'));
            }
        }

        // Number check to matching--------------
        if(!empty($request->input('first_mobile')) && !empty($request->input('second_mobile'))){
            $ph_match = Str::is($request->input('first_mobile'), $request->input('second_mobile'));
            if($ph_match){
                $valid_different_number = "Another phone number should be different!";
                return redirect()->route('donor.donorregistrationfinal', compact('valid_different_number'));
            }
        }

        // Define Donor activity against donation date------------
        $data['status'] = $request->input('last_donate');
        $date = date('d-m-Y');
        $last_donation = Carbon::createFromDate($request->input('last_donate'));
        $datework = Carbon::createFromDate($date);
        $testdate = $datework->diffInDays($last_donation);
        $month = $testdate/30;
        if($month>4){
            $data['status'] ='1';
        }else{
            $data['status'] ='0';
        }

        // Modefy user id--------------------------------------
        $userId = User::latest('id')->first();
        $donor_id = $userId->donor_id;
        // return $donor_id;

        $donor_id_last = substr($donor_id, -3);
        // return $donor_id_last;

        $donor_id_last = $donor_id_last+1;
        // return $donor_id_last;

        // get blood code agains blood group----------
        $blood = DB::table('bloods')->where('blood_name', $request->input('blood_group'))->first();
        $bloodcode = $blood->blood_value;

        // district code-----------------
        $discode = '33';

        $data['donor_id'] = $discode.$bloodcode.$donor_id_last;

        // return $data;

        // Data insert if user image not empty
        $image = $request->file('image');
        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'backend/img/user/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['image'] = $image_url;
                $donor_insert = DB::table('users')->insert($data);
                if ($donor_insert) {
                    session()->flush();
                    $request->session()->put('message', "Registration successfully done!");
                    return redirect()->route('donor.registration.confirm');
                }else{
                    $error_message = "Registration failed!";
                    return redirect()->route('donor.donorregistrationfinal', compact('error_message'));
                }
            }else{
                $error_image = "Image not store to folder!";
                return redirect()->route('donor.donorregistrationfinal', compact('error_image'));
            }
        }else{
            $donor_insert = DB::table('users')->insert($data);
            if ($donor_insert) {
                session()->flush();
                $request->session()->put('message', "Registration successfully done!");
                return redirect()->route('donor.registration.confirm');
            }else{
                $error_message = "Registration failed!";
                return redirect()->route('donor.donorregistrationfinal', compact('error_message'));
            }
        }

    }

    public function registration_confirm()
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

        return view('frontend.pages.donorregistrationconfirm', compact('donors', 'bloods', 'areas', 'website', 'slider', 'activedonorcount', 'bloodrequestcount'));
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
