<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Laravel\Controllers\Portal\Controller;
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Portal\CMS\CMSContactRequest;
use App\Laravel\Models\CMS;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $this->data['page_title'] = "Contact Page";
        $this->data['record'] = CMS::contact();
        return view('portal.cms.contact', $this->data);
    }

    public function update(CMSContactRequest $request)
    {
        DB::beginTransaction();

        try {
            $contact = CMS::contact() ?? CMS::forTable('cms_contact');
            $contact->setTable('cms_contact');
            $contact->title = $request->input('title');
            $contact->content = $request->input('content');
            $contact->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Contact page successfully updated.");
            return redirect()->route('portal.cms.contact');
        } catch (\Exception $e) {
            DB::rollback();

            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }
}
