<?php

namespace App\Laravel\Controllers\Portal;

use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Portal\UserAccountUpdateRequest;
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
        $this->data['record'] = Auth('user')->user();

        return view('portal.account-management.show', $this->data);
    }

    public function edit(PageRequest $request)
    {
        $this->data['record'] = Auth('user')->user();

        return view('portal.account-management.edit', $this->data);
    }

    public function update(UserAccountUpdateRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = Auth('user')->user();
            $user->name = strtoupper($request->input('name'));
            $user->email = strtolower($request->input('email'));

            if ($request->filled('password')) {
                $user->password = bcrypt($request->input('password'));
            }

            if ($request->hasFile('profile_photo')) {
                if ($user->profile_photo_path) {
                    Storage::disk('public')->delete($user->profile_photo_path);
                }

                $user->profile_photo_path = $request->file('profile_photo')->store('profile-photos/user', 'public');
            }

            $user->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Profile successfully updated.");
            return redirect()->route('portal.profile.show');
        } catch (\Exception $e) {
            DB::rollback();

            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }
}
