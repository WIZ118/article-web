<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Backoffice\AdminAccountUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->data['page_title'] = "Profile";
    }

    public function show(PageRequest $request)
    {
        $this->data['record'] = Auth('admin')->user();

        return view('backoffice.profile.show', $this->data);
    }

    public function edit(PageRequest $request)
    {
        $this->data['record'] = Auth('admin')->user();

        return view('backoffice.profile.edit', $this->data);
    }

    public function update(AdminAccountUpdateRequest $request)
    {
        DB::beginTransaction();

        try {
            $admin = Auth('admin')->user();
            $admin->name = strtoupper($request->input('name'));
            $admin->email = strtolower($request->input('email'));

            if ($request->filled('password')) {
                $admin->password = bcrypt($request->input('password'));
            }

            if ($request->hasFile('profile_photo')) {
                if ($admin->profile_photo_path) {
                    Storage::disk('public')->delete($admin->profile_photo_path);
                }

                $admin->profile_photo_path = $request->file('profile_photo')->store('profile-photos/admin', 'public');
            }

            $admin->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Profile successfully updated.");
            return redirect()->route('backoffice.profile.show');
        } catch (\Exception $e) {
            DB::rollback();

            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }
}
