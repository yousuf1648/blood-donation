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
use App\Models\Admin\BloodBank;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BloodBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $website = Website::latest()->first();
        $bloodbanks = DB::table('blood_banks')
                        ->join('districts', 'blood_banks.dis_id', 'districts.id')
                        ->select('blood_banks.*', 'districts.dis_name', 'districts.id as district_id')
                        ->orderBy('blood_banks.id', 'DESC')
                        ->get();
        $districts = District::all();

        return view('backend.pages.bloodbank.index', compact('website', 'bloodbanks', 'districts'));
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
            'dis_id' => 'required',
            'blood_bank_name' => 'required|min:3|max:100|unique:blood_banks',
            'blood_bank_address' => 'required|unique:blood_banks',
            'blood_bank_number' => 'required'
        ]);

        $bloodbank = new BloodBank();

        $bloodbank->dis_id = $request->input('dis_id');
        $bloodbank->blood_bank_name = $request->input('blood_bank_name');
        $bloodbank->slug = Str::slug($request->input('blood_bank_name'));
        $bloodbank->blood_bank_address = $request->input('blood_bank_address');
        $bloodbank->blood_bank_number = $request->input('blood_bank_number');
        $bloodbank->status = '1';

        $bloodbank_insert = $bloodbank->save();
        if ($bloodbank_insert) {
            return redirect()->route('admin.bloodbank')->with('message','Bloodbank added Successfully');
        }else{
            return redirect()->route('admin.bloodbank')->with('error','Bloodbank dose not added!');
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
            'dis_id' => 'required',
            'blood_bank_name' => 'required|min:3|max:100',
            'blood_bank_address' => 'required',
            'blood_bank_number' => 'required'
        ]);

        $bloodbank = array();

        $bloodbank['dis_id'] = $request->input('dis_id');
        $bloodbank['blood_bank_name'] = $request->input('blood_bank_name');
        $bloodbank['slug'] = Str::slug($request->input('blood_bank_name'));
        $bloodbank['blood_bank_address'] = $request->input('blood_bank_address');
        $bloodbank['blood_bank_number'] = $request->input('blood_bank_number');

        $update_bloodbank = DB::table('blood_banks')->where('id', $id)->update($bloodbank);
        if ($update_bloodbank) {
            return redirect()->route('admin.bloodbank')->with('message','Bloodbank upadated Successfully!');
        }else{
            return redirect()->route('admin.bloodbank')->with('error','Bloodbank dose not updated!');
        }
    }

    // Change bloodbank activity--------------
    public function bloodbank_activity(Request $request)
    {
        // return $request->user_id;
        $bloodbank = BloodBank::find($request->bloodbank_id);
        $bloodbank->status = $request->status;
        $bloodbank->save();

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
        $delete = DB::table('blood_banks')->where('id', $id)->delete();
        if($delete){
            return redirect()->route('admin.bloodbank')->with('message','Bloodbank deleted Successfully!');
        }else{
            return redirect()->route('admin.bloodbank')->with('error','Have some errors!!');
        }
    }
}
