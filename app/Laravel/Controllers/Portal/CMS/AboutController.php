<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Laravel\Controllers\Portal\Controller;
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Portal\CMS\CMSAboutRequest;
use App\Laravel\Models\CMS;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $this->data['page_title'] = "About Page";
        $this->data['record'] = CMS::about();
        return view('portal.cms.about', $this->data);
    }

    public function update(CMSAboutRequest $request)
    {
        DB::beginTransaction();

        try {
            $about = CMS::about() ?? CMS::forTable('cms_about');
            $about->setTable('cms_about');
            $about->title = $request->input('title');
            $about->content = $request->input('content');
            $about->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "About page successfully updated.");
            return redirect()->route('portal.cms.about');
        } catch (\Exception $e) {
            DB::rollback();

            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }
}
