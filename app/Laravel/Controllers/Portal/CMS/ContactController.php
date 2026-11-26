<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Laravel\Controllers\Portal\Controller;
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Portal\CMS\ContactRequest;
use App\Laravel\Models\CMS;
use App\Laravel\Models\CMSContact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $this->data['page_title'] = "Contact Page";
        $this->data['record'] = CMS::contact(Auth::guard('user')->id());
        return view('portal.cms.contact', $this->data);
    }

    public function update(ContactRequest $request)
    {
        DB::beginTransaction();

        try {
            $userId = Auth::guard('user')->id();
            $contact = CMS::contact($userId) ?? new CMSContact();
            $contact->user_id = $userId;
            $contact->title = $request->input('title');
            $contact->content = $request->input('content');
            $contact->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Contact page successfully updated.");
            return redirect()->route('portal.cms.contact');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to update user contact page content.', ['exception' => $e]);

            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }
}
