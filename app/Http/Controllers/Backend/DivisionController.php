<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Division;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::all();

        return view('backend.pages.location.division', compact('divisions'));
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
            'div_name' => 'required|unique:divisions|max:100',
        ],[
            'div_name.required'=> 'Please give a unique division name.'
        ]);

        $division = new Division();

        $division->div_name = $request->div_name;
        $division->slug = Str::slug($request->div_name);

        $division->save();

        return redirect()->route('admin.division')->with('message','Division added Successfully');
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
            'div_name' => 'required|max:100',
        ],[
            'div_name.required'=> 'Please give a unique division name.'
        ]);

        $data = array();

        $data['div_name'] = Str::ucfirst($request->input('div_name'));
        $data['slug'] = Str::slug($request->input('div_name'));

        $update = DB::table('divisions')->where('id', $id)->update($data);

        if($update){
            return redirect()->route('admin.division')->with('message','Division updated Successfully!');
        }else{
            return redirect()->route('admin.division')->with('error','Division dose not updated Successfully!');
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
        $delete = DB::table('divisions')->where('id', $id)->delete();

        if($delete){
            return redirect()->route('admin.division')->with('message','Division deleted Successfully!');
        }else{
            return redirect()->route('admin.division')->with('error','Have some errors!!');
        }
    }
}
