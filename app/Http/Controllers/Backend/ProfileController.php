<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Area;
use App\Models\Admin\Role;
use App\Models\Admin\Blood;
use App\Models\Admin\Postcode;
use App\Models\Admin\Thana;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id  = Auth::user()->id;
        $profile_info = DB::table('users')
                ->join('roles', 'users.role_id', 'roles.id')
                ->select('users.*', 'roles.name as role_name')
                ->where('users.id', $id)
                ->first();
        $bloods = Blood::all();

        return view('backend.pages.profile.profile', compact('profile_info', 'bloods'));
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
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:50',
            'username' => 'required|min:3|max:50',
            'email' => 'required',
            'first_mobile' => 'required',
            'blood_group' => 'required',
            'username' => 'required'
        ]);

        $data = array();

        $data['name'] = Str::ucfirst($request->input('name'));
        $data['username'] = $request->input('username');
        $data['email'] = $request->input('email');
        $data['blood_group'] = $request->input('blood_group');
        $data['present_address'] = $request->input('present_address');
        $data['permanent_address'] = $request->input('permanent_address');

        $image = $request->file('image');

        // phone number check---------------------------------------
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
                    return redirect()->route('admin.profile')->with('error','Phone number is not valide!');
                }
            }else{
                return redirect()->route('admin.profile')->with('error','Phone number is must be 13 character!');
            }
        }

        // Id assign for every user-----------------------------------
        // last 3 digit split from last entried user's donor id--
        $userId = DB::table('users')->where('id', $id)->first();

        $donor_id = $userId->donor_id;
        $donor_id_last = substr($donor_id, -3);

        // get blood code agains blood group----------
        $blood = DB::table('bloods')->where('blood_name', $request->input('blood_group'))->first();
        $bloodcode = $blood->blood_value;

        // district code-----------------
        $discode = '33';

        $data['donor_id'] = $discode.$bloodcode.$donor_id_last;

        // Update----------------
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
                if($old_img_path){
                    $old_img_dlt = unlink($old_img_path);
                    if ($old_img_dlt) {
                        $update_user = DB::table('users')->where('id', $id)->update($data);
                        if ($update_user) {
                            return redirect()->route('admin.profile')->with('message','Profile upadated Successfully!');
                        }else{
                            return redirect()->route('admin.profile')->with('error','Profile dose not updated!');
                        }
                    }else{
                        return redirect()->route('admin.profile')->with('error','Old image dose not deleted!');
                    }
                }else{
                    $update_user = DB::table('users')->where('id', $id)->update($data);
                    if ($update_user) {
                        return redirect()->route('admin.profile')->with('message','Profile upadated Successfully!');
                    }else{
                        return redirect()->route('admin.profile')->with('error','Profile dose not updated!');
                    }
                }
            }else{
                return redirect()->route('admin.profile')->with('error','Image not store to folder!');
            }
        }else{
            $update_user = DB::table('users')->where('id', $id)->update($data);
            if ($update_user) {
                return redirect()->route('admin.profile')->with('message','Profile upadated Successfully!');
            }else{
                return redirect()->route('admin.profile')->with('error','Profile dose not updated!');
            }
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
