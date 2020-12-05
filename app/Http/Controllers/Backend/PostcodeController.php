<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Thana;
use App\Models\Admin\Postcode;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thanas = Thana::all();
        $postcodes = Postcode::all();

        return view('backend.pages.location.postcode', compact('thanas', 'postcodes'));
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
            'post_code' => 'required|unique:postcodes|max:100',
            'thana_id' => 'required',
        ],[
            'post_code.required'=> 'Please give a unique post code.'
        ]);

        $postcode = new Postcode();

        $postcode->thana_id = $request->thana_id;
        $postcode->post_code = $request->post_code;
        $postcode->slug = Str::slug($request->post_code);

        $postcode->save();

        return redirect()->route('admin.postcode')->with('message','Post Code added Successfully');
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
            'post_code' => 'required|max:100',
        ],[
            'post_code.required'=> 'Please give a unique District name.'
        ]);

        $data = array();

        $data['post_code'] = Str::ucfirst($request->input('post_code'));
        $data['slug'] = Str::slug($request->input('post_code'));

        $update = DB::table('postcodes')->where('id', $id)->update($data);

        if($update){
            return redirect()->route('admin.postcode')->with('message','Postcode updated Successfully!');
        }else{
            return redirect()->route('admin.postcode')->with('error','Postcode dose not updated Successfully!');
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
        $delete = DB::table('postcodes')->where('id', $id)->delete();

        if($delete){
            return redirect()->route('admin.postcode')->with('message','Postcode deleted Successfully!');
        }else{
            return redirect()->route('admin.postcode')->with('error','Have some errors!!');
        }
    }
}
