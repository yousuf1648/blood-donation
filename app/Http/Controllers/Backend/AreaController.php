<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Thana;
use App\Models\Admin\Area;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thanas = Thana::all();
        $areas = Area::all();

        return view('backend.pages.location.area', compact('areas', 'thanas'));
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
            'area_name' => 'required|unique:areas|max:100',
            'thana_id' => 'required',
        ],[
            'area_name.required'=> 'Please give a unique area.'
        ]);

        $area = new Area();

        $area->thana_id = $request->thana_id;
        $area->area_name = $request->area_name;
        $area->slug = Str::slug($request->area_name);

        $area->save();

        return redirect()->route('admin.area')->with('message','Area added Successfully');
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
            'area_name' => 'required|max:100',
        ],[
            'area_name.required'=> 'Please give a unique Area name.'
        ]);

        $data = array();

        $data['area_name'] = Str::ucfirst($request->input('area_name'));
        $data['slug'] = Str::slug($request->input('area_name'));

        $update = DB::table('areas')->where('id', $id)->update($data);

        if($update){
            return redirect()->route('admin.area')->with('message','Area updated Successfully!');
        }else{
            return redirect()->route('admin.area')->with('error','Area dose not updated Successfully!');
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
        $delete = DB::table('areas')->where('id', $id)->delete();

        if($delete){
            return redirect()->route('admin.area')->with('message','Area deleted Successfully!');
        }else{
            return redirect()->route('admin.area')->with('error','Have some errors!!');
        }
    }
}
