<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Laravel\Controllers\Portal\Controller;
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Portal\CMS\AboutRequest;
use App\Laravel\Models\CMS;
use App\Laravel\Models\CMSAbout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AboutController extends Controller
{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $this->data['page_title'] = "About Page";
        $this->data['record'] = CMS::about(Auth::guard('user')->id());
        return view('portal.cms.about', $this->data);
    }

    public function update(AboutRequest $request)
    {
        DB::beginTransaction();

        try {
            $userId = Auth::guard('user')->id();
            $about = CMS::about($userId) ?? new CMSAbout();
            $about->user_id = $userId;
            $about->title = $request->input('title');
            $about->content = $request->input('content');
            $about->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "About page successfully updated.");
            return redirect()->route('portal.cms.about');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to update user about page content.', ['exception' => $e]);

            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }
}
