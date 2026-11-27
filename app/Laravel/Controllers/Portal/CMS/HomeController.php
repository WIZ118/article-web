<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Laravel\Controllers\Portal\Controller;
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Portal\CMS\HomeRequest;
use App\Laravel\Models\CMS;
use App\Laravel\Models\CMSHome;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $this->data['page_title'] = "Home Page";
        $this->data['record'] = CMS::home(Auth::guard('user')->id());
        return view('portal.cms.home', $this->data);
    }

    public function update(HomeRequest $request)
    {
        DB::beginTransaction();

        try {
            $userId = Auth::guard('user')->id();
            $home = CMS::home($userId) ?? new CMSHome();
            $home->user_id = $userId;
            $home->title = $request->input('title');
            $home->content = $request->input('content');
            $home->badge_text = $request->input('badge_text');
            $home->primary_button_label = $request->input('primary_button_label');
            $home->secondary_button_label = $request->input('secondary_button_label');
            $home->featured_label = $request->input('featured_label');
            $home->featured_title = $request->input('featured_title');
            $home->featured_link_label = $request->input('featured_link_label');
            $home->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Home page successfully updated.");
            return redirect()->route('portal.cms.home');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to update user home page content.', ['exception' => $e]);

            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }
}
