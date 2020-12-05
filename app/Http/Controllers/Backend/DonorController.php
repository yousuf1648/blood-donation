<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Area;
use Illuminate\Http\Request;
use App\Models\Admin\Role;
use App\Models\Admin\Blood;
use App\Models\Admin\Postcode;
use App\Models\Admin\Thana;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donors = DB::table('users')
                ->where('is_donor', '1')
                ->get()->sortBy("id");

        return view('backend.pages.donormanage.donor', compact('donors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bloods = Blood::all();

        return view('backend.pages.donormanage.donorcreate', compact('bloods'));
    }

    public function createfinal(){
        return view('backend.pages.donormanage.donorcreatefinal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  Before registration stage--------
    public function first_stage(Request $request){

        $validatedData = $request->validate([
            'weight' => 'required',
            'age' => 'required',
            'height' => 'required',
            'disease' => 'min:0|max:0',
            'smoker' => 'required',
            'marital_status' => 'required',
        ]);

        if ($request->input('weight') <= '51' || $request->input('weight') >= '90') {
            return redirect()->route('admin.donor.create')->with('error','Weight is not valid for register!');
        }elseif($request->input('age') <= '18' || $request->input('age') >= '40'){
            return redirect()->route('admin.donor.create')->with('error','Age is not valid for register!');
        }else{
            $data = array();
            $data['weight'] = $request->input('weight');
            $data['age'] = $request->input('age');
            $data['height'] = $request->input('height');
            $data['disease'] = "না";
            $data['smoker'] = $request->input('smoker');
            $data['marital_status'] = $request->input('marital_status');

            // $data = $request->input();
            // $request->session()->put('Data', $data);

            // $key = Str::random(6);
            $key = Auth::user()->role_id;
            $data['key'] = $key;
            $data_insert = DB::table('beforeregistration')->insert($data);

            if($data_insert){
                // $reb_bef_code = $key;
                // $reb_bef_data = DB::table('beforeregistration')->where('key', '=', $key)->get();
                // return $reb_bef_data;
                return redirect()->route('admin.donor.createfinal');
                // return view('backend.pages.donormanage.donorcreatefinal', compact('reb_bef_data'));
                // return redirect()->URL::to('donor-create-final', compact('reb_bef_data'));
            }else{
                return redirect()->route('admin.donor.create')->with('error','Data not save!');
            }
        }

    }

     // get area against thana name-----------------
     public function donor_postcode(Request $request)
     {
         $thana_id = $request->thana_id;

         if (!$thana_id) {
             $html = '<option value="">'.'------Select One-----'.'</option>';
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
            $html = '<option value="">'.'------Select One-----'.'</option>';
        } else {
            $html = '';
            $areas = Area::where('thana_id',$thana_id)->get();
            foreach ($areas as $area) {
                $html .= '<option value="'.$area->id.'">'.$area->area_name.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        // return $request->input('weight');
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

        // return $data;

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
                    return redirect()->route('admin.donor.createfinal')->with('error','Phone number is not valide!');
                }
            }else{
                return redirect()->route('admin.donor.createfinal')->with('error','Phone number is must be 13 character!');
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
                    return redirect()->route('admin.donor.createfinal')->with('error','Phone number is not valide!');
                }
            }else{
                return redirect()->route('admin.donor.createfinal')->with('error','Phone number is must be 13 character!');
            }
        }

        // Number check to matching--------------
        if(!empty($request->input('first_mobile')) && !empty($request->input('second_mobile'))){
            $ph_match = Str::is($request->input('first_mobile'), $request->input('second_mobile'));
            if($ph_match){
                return redirect()->route('admin.donor.createfinal')->with('error','Another phone number should be different!');
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
                    DB::table('beforeregistration')->where('key', Auth::user()->role_id)->delete();
                    return redirect()->route('admin.donor')->with('message','donor added Successfully');
                }else{
                    return redirect()->route('admin.donor')->with('error','donor dose not added!');
                }
            }else{
                return redirect()->route('admin.donor')->with('error','Image not store to folder!');
            }
        }else{
            $donor_insert = DB::table('users')->insert($data);
            if ($donor_insert) {
                DB::table('beforeregistration')->where('key', Auth::user()->role_id)->delete();
                return redirect()->route('admin.donor')->with('message','donor added Successfully');
            }else{
                return redirect()->route('admin.donor')->with('error','donor dose not added!');
            }
        }
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
        $donors  = DB::table('users')
                        ->join('thanas', 'users.thana', 'thanas.id')
                        ->join('areas', 'users.area', 'areas.id')
                        ->join('postcodes', 'users.post_code', 'postcodes.id')
                        ->select('users.*', 'thanas.name as thana_name', 'thanas.id as thana_id', 'areas.area_name', 'areas.id as area_id', 'postcodes.post_code', 'postcodes.id as post_code_id')
                        ->where('users.id', $id)->first();
        return view('backend.pages.donormanage.donoredit', compact('donors'));
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
        $validatedData = $request->validate([
            'weight'            => 'required',
            'age'               => 'required',
            'height'            => 'required',
            'disease'           => 'required',
            'smoker'            => 'required',
            'marital_status'    => 'required',
            'name'              => 'required|min:3|max:50',
            'blood_group'       => 'required',
            'birthday'          => 'required',
            'gender'            => 'required',
            'last_donate'       => 'required',
            'first_mobile'      => 'required',
            'thana'             => 'required',
            'post_code'         => 'required',
            'area'              => 'required',
            'present_address'   => 'required',
            'permanent_address' => 'required',
            'username'          => 'required|min:3|max:50',
            'email'             => 'required|',
        ]);

        $data = array();

        $data['name'] = Str::ucfirst($request->input('name'));
        $data['username'] = $request->input('username');
        $data['email'] = $request->input('email');
        $data['password'] = Hash::make($request->input('password'));

        $data['weight'] = $request->input('weight');
        $data['age'] = $request->input('age');
        $data['height'] = $request->input('height');
        $data['disease'] = $request->input('disease');
        $data['smoker'] = $request->input('smoker');
        $data['marital_status'] = $request->input('marital_status');

        $data['blood_group'] = $request->input('blood_group');
        $data['birthday'] = $request->input('birthday');
        $data['gender'] = $request->input('gender');
        $data['present_address'] = $request->input('present_address');
        $data['permanent_address'] = $request->input('permanent_address');

        $data['thana'] = $request->input('thana');
        $data['area'] = $request->input('area');
        $data['post_code'] = $request->input('post_code');

        // return $data;

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
                    return redirect()->route('admin.donor.createfinal')->with('error','Phone number is not valide!');
                }
            }else{
                return redirect()->route('admin.donor.createfinal')->with('error','Phone number is must be 13 character!');
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
                    return redirect()->route('admin.donor.createfinal')->with('error','Phone number is not valide!');
                }
            }else{
                return redirect()->route('admin.donor.createfinal')->with('error','Phone number is must be 13 character!');
            }
        }

        // Number check to matching--------------
        if(!empty($request->input('first_mobile')) && !empty($request->input('second_mobile'))){
            $ph_match = Str::is($request->input('first_mobile'), $request->input('second_mobile'));
            if($ph_match){
                return redirect()->route('admin.donor.createfinal')->with('error','Another phone number should be different!');
            }
        }

        // Define Donor activity against donation date------------
        $data['last_donate'] = $request->input('last_donate');
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

        $donor_id_last = $donor_id_last;
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
                $old_img = DB::table('users')->where('id', $id)->first();
                $old_img_path = $old_img->image;
                $old_img_dlt = unlink($old_img_path);
                if ($old_img_dlt) {
                    $update_user = DB::table('users')->where('id', $id)->update($data);
                    if ($update_user) {
                        return redirect()->route('admin.donor')->with('message','Donor upadated Successfully!');
                    }else{
                        return redirect()->route('admin.donor')->with('error','Donor dose not updated!');
                    }
                }else{
                    return redirect()->route('admin.donor')->with('error','Old image dose not deleted!');
                }
            }else{
                return redirect()->route('admin.donor')->with('error','Image not store to folder!');
            }
        }else{
            $update_user = DB::table('users')->where('id', $id)->update($data);
            if ($update_user) {
                return redirect()->route('admin.donor')->with('message','Donor upadated Successfully!');
            }else{
                return redirect()->route('admin.donor')->with('error','Donor dose not updated!');
            }
        }
    }


    // Change donor activity--------------
    public function donor_activity(Request $request)
    {
        // return $request->user_id;
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    // View active donor----------------
    public function donor_active(){
        $donors = DB::table('users')
                ->where('is_donor', '1')
                ->where('status', '1')
                ->get()->sortBy("id");

        return view('backend.pages.donormanage.activedonor', compact('donors'));
    }

    // View inactive donor----------------
    public function donor_inactive(){
        $donors = DB::table('users')
                ->where('is_donor', '1')
                ->where('status', '0')
                ->get()->sortBy("id");

        return view('backend.pages.donormanage.inactivedonor', compact('donors'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old_img = DB::table('users')->where('id', $id)->first();
        $old_img_path = $old_img->image;
        if($old_img_path){
            unlink($old_img_path);
            $delete = DB::table('users')->where('id', $id)->delete();
            if($delete){
                return redirect()->route('admin.donor')->with('message','Donor deleted Successfully!');
            }else{
                return redirect()->route('admin.donor')->with('error','Have some errors!!');
            }
        }else{
            $delete = DB::table('users')->where('id', $id)->delete();

            if($delete){
                return redirect()->route('admin.donor')->with('message','Donor deleted Successfully!');
            }else{
                return redirect()->route('admin.donor')->with('error','Have some errors!!');
            }
        }
    }
}
