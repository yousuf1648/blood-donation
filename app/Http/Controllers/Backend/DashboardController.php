<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Website;
use App\Models\Frontend\BloodRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $website = Website::latest()->first();
        $donors = DB::table('users')
                ->where('is_donor', '1')
                ->get()->sortBy("id");
        $donorcount = $donors->count();

        $active_donors = DB::table('users')
                ->where('is_donor', '1')
                ->where('status', '1')
                ->get()->sortBy("id");
        $active_donors_count = $active_donors->count();

        $pending_bloodrequests = BloodRequest::where('status', '0')->orderBy('id', 'DESC')->get();
        $pending_bloodrequests_count = $pending_bloodrequests->count();

        $approve_bloodrequests = BloodRequest::where('status', '1')->orderBy('id', 'DESC')->get();
        $approve_bloodrequests_count = $approve_bloodrequests->count();

        return view('backend.pages.dashboard.index', compact('website', 'donorcount', 'active_donors_count', 'pending_bloodrequests_count', 'approve_bloodrequests_count'));
    }
}
