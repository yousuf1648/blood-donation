<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Division;
use App\Models\Admin\District;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::all();
        $districts = District::all();

        return view('backend.pages.location.district', compact('divisions', 'districts'));
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
        $request->validate([
            'dis_name' => 'required|unique:districts|max:100',
            'div_id' => 'required',
        ],[
            'dis_name.required'=> 'Please give a unique district name.'
        ]);

        $district = new District();

        $district->div_id = $request->div_id;
        $district->dis_name = $request->dis_name;
        $district->slug = Str::slug($request->dis_name);

        $district->save();

        return redirect()->route('admin.district')->with('message','District name added Successfully!');
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
        $request->validate([
            'dis_name' => 'required|max:100',
        ],[
            'dis_name.required'=> 'Please give a unique District name.'
        ]);

        $data = array();

        $data['dis_name'] = Str::ucfirst($request->input('dis_name'));
        $data['slug'] = Str::slug($request->input('dis_name'));

        $update = DB::table('districts')->where('id', $id)->update($data);

        if($update){
            return redirect()->route('admin.district')->with('message','Postcode updated Successfully!');
        }else{
            return redirect()->route('admin.district')->with('error','Postcode dose not updated Successfully!');
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
        $delete = DB::table('districts')->where('id', $id)->delete();

        if($delete){
            return redirect()->route('admin.district')->with('message','District name deleted Successfully!');
        }else{
            return redirect()->route('admin.district')->with('error','Have some errors!!');
        }
    }
}
