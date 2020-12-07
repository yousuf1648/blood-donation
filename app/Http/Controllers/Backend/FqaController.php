<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Fqa;
use App\Models\Admin\Website;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FqaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $website = Website::latest()->first();
        $fqas = Fqa::all();

        return view('backend.pages.fqa.index', compact('website', 'fqas'));
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
            'question' => 'required|max:200|unique:fqas',
            'answere' => 'required',
        ]);

        $fqa = new Fqa();

        $fqa->question = $request->input('question');
        $fqa->slug = Str::slug($request->input('question'));
        $fqa->answere = $request->input('answere');
        $fqa->status = '1';

        $fqa_insert = $fqa->save();
        if ($fqa_insert) {
            return redirect()->route('admin.fqa')->with('message','Fqa added Successfully');
        }else{
            return redirect()->route('admin.fqa')->with('error','Fqa dose not added!');
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
            'question' => 'required|max:200',
            'answere' => 'required',
        ]);

        $fqa = array();

        $fqa['question'] = $request->input('question');
        $fqa['slug'] = Str::slug($request->input('question'));
        $fqa['answere'] = $request->input('answere');

        $update_fqa = DB::table('fqas')->where('id', $id)->update($fqa);
        if ($update_fqa) {
            return redirect()->route('admin.fqa')->with('message','Fqa upadated Successfully!');
        }else{
            return redirect()->route('admin.fqa')->with('error','Fqa dose not updated!');
        }
    }

    // Change FQA activity--------------
    public function fqa_activity(Request $request)
    {
        // return $request->user_id;
        $fqa = Fqa::find($request->fqa_id);
        $fqa->status = $request->status;
        $fqa->save();

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
        $delete = DB::table('fqas')->where('id', $id)->delete();
        if($delete){
            return redirect()->route('admin.fqa')->with('message','Fqa deleted Successfully!');
        }else{
            return redirect()->route('admin.fqa')->with('error','Have some errors!!');
        }
    }
}
