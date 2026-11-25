<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Laravel\Controllers\Portal\Controller;
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Portal\CMS\CMSHomeRequest;
use App\Laravel\Models\CMS;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $this->data['page_title'] = "Home Page";
        $this->data['record'] = CMS::home();
        return view('portal.cms.home', $this->data);
    }

    public function update(CMSHomeRequest $request)
    {
        DB::beginTransaction();

        try {
            $home = CMS::home() ?? CMS::forTable('cms_home');
            $home->setTable('cms_home');
            $home->title = $request->input('title');
            $home->content = $request->input('content');
            $home->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Home page successfully updated.");
            return redirect()->route('portal.cms.home');
        } catch (\Exception $e) {
            DB::rollback();

            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }
}
