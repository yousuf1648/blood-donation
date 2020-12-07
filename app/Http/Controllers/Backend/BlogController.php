<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Blog;
use App\Models\Admin\Website;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $website = Website::latest()->first();
        $blogs = Blog::orderBy('id', 'DESC')->get();

        return view('backend.pages.blog.index', compact('website', 'blogs'));
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
            'title' => 'required|max:200|unique:blogs',
            'details' => 'required',
            'feature_image' => 'required',
        ]);

        $blog = new Blog();

        $blog->title = Str::ucfirst($request->input('title'));
        $blog->slug = Str::slug($request->input('title'));
        $blog->details = $request->input('details');
        $blog->blog_date = date('d-M-Y');
        date_default_timezone_set("Asia/Dhaka");
        $blog->blog_time = date("g:i a");
        $blog->status = '1';

        $feature_image = $request->file('feature_image');

        if(isset($feature_image)){
            $feature_image_name = Str::random(20);
            $feature_image_ext = strtolower($feature_image->getClientOriginalExtension());
            $feature_image_full_name = $feature_image_name.'.'.$feature_image_ext;
            $feature_image_upload_path = 'backend/img/blog/';
            $feature_image_image_url = $feature_image_upload_path.$feature_image_full_name;
            $feature_image_success = $feature_image->move($feature_image_upload_path, $feature_image_full_name);
            if ($feature_image_success) {
                $blog->feature_image = $feature_image_image_url;
                $blog_insert = $blog->save();
                if ($blog_insert) {
                    return redirect()->route('admin.blog')->with('message','Blog post added Successfully');
                }else{
                    return redirect()->route('admin.blog')->with('error','Blog post dose not added!');
                }
            }else{
                return redirect()->route('admin.blog')->with('error','Image not store to folder!');
            }
        }else{
            return redirect()->route('admin.blog')->with('error','Have some different error!');
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
            'title' => 'required|max:200',
            'details' => 'required',
        ]);

        $data = array();
        $data['title'] = Str::ucfirst($request->input('title'));
        $data['slug'] = Str::slug($request->input('title'));
        $data['details'] = $request->input('details');

        $feature_image = $request->file('feature_image');

        if(isset($feature_image)){
            $feature_image_name = Str::random(20);
            $feature_image_ext = strtolower($feature_image->getClientOriginalExtension());
            $feature_image_full_name = $feature_image_name.'.'.$feature_image_ext;
            $feature_image_upload_path = 'backend/img/blog/';
            $feature_image_image_url = $feature_image_upload_path.$feature_image_full_name;
            $feature_image_success = $feature_image->move($feature_image_upload_path, $feature_image_full_name);
            if ($feature_image_success) {
                $data['feature_image'] = $feature_image_image_url;

                $old_img = DB::table('blogs')->where('id', $id)->first();
                $old_feature_img_path = $old_img->feature_image;

                if($old_feature_img_path){
                    $old_feature_img_dlt = unlink($old_feature_img_path);
                    if ($old_feature_img_dlt) {
                        $update_blog = DB::table('blogs')->where('id', $id)->update($data);
                        if ($update_blog) {
                            return redirect()->route('admin.blog')->with('message','Blog post upadated Successfully!');
                        }else{
                            return redirect()->route('admin.blog')->with('error','Blog post dose not updated!');
                        }
                    }else{
                        return redirect()->route('admin.blog')->with('error','Old image dose not deleted!');
                    }
                }else{
                    return redirect()->route('admin.blog')->with('error','Have img error!');
                }
            }else{
                return redirect()->route('admin.blog')->with('error','Image not store to folder!');
            }
        }else{
            $update_blog = DB::table('blogs')->where('id', $id)->update($data);
            if ($update_blog) {
                return redirect()->route('admin.blog')->with('message','Blog post upadated Successfully!');
            }else{
                return redirect()->route('admin.blog')->with('error','Blog post dose not updated!');
            }
        }

    }

    // Change Blog Post activity--------------
    public function blog_activity(Request $request)
    {
        // return $request->user_id;
        $fqa = Blog::find($request->blog_id);
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
        $old_img = DB::table('blogs')->where('id', $id)->first();
        $old_img_path = $old_img->feature_image;
        if($old_img_path){
            unlink($old_img_path);
            $delete = DB::table('blogs')->where('id', $id)->delete();
            if($delete){
                return redirect()->route('admin.blog')->with('message','Blog post deleted Successfully!');
            }else{
                return redirect()->route('admin.blog')->with('error','Have some errors!!');
            }
        }else{
            $delete = DB::table('blogs')->where('id', $id)->delete();
            if($delete){
                return redirect()->route('admin.blog')->with('message','Blog post deleted Successfully!');
            }else{
                return redirect()->route('admin.blog')->with('error','Have some errors!!');
            }
        }
    }
}
