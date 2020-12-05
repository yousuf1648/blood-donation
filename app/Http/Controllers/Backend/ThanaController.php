<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Thana;
use App\Models\Admin\District;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ThanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thanas = Thana::all();
        $districts = District::all();

        return view('backend.pages.location.thana', compact('thanas','districts'));
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
            'thana_name' => 'required|unique:thanas|max:100',
            'dis_id' => 'required',
        ],[
            'thana_name.required'=> 'Please give a unique thana name.'
        ]);

        $thana = new Thana();
        $thana->dis_id = $request->dis_id;
        $thana->thana_name = $request->thana_name;
        $thana->slug = Str::slug($request->thana_name);

        $thana->save();

        return redirect()->route('admin.thana')->with('message','Division added Successfully');

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
            'thana_name' => 'required|max:100',
        ],[
            'thana_name.required'=> 'Please give a unique thana name.'
        ]);

        $data = array();

        $data['thana_name'] = Str::ucfirst($request->input('thana_name'));
        $data['slug'] = Str::slug($request->input('thana_name'));

        $update = DB::table('thanas')->where('id', $id)->update($data);

        if($update){
            return redirect()->route('admin.thana')->with('message','Thana updated Successfully!');
        }else{
            return redirect()->route('admin.thana')->with('error','THana dose not updated Successfully!');
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
        $delete = DB::table('thanas')->where('id', $id)->delete();

        if($delete){
            return redirect()->route('admin.thana')->with('message','Thana deleted Successfully!');
        }else{
            return redirect()->route('admin.thana')->with('error','Have some errors!!');
        }
    }
}
