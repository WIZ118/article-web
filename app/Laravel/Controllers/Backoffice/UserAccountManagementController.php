<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Requests\PageRequest;
use App\Laravel\Models\User;
use Illuminate\Support\Facades\DB;
use App\Laravel\Requests\Backoffice\UserAccountUpdateRequest;
use App\Laravel\Requests\Backoffice\UserAccountPasswordRequest;

class UserAccountManagementController extends Controller
{
    public function __construct()
    {
        $this->data['page-title'] = "User Account Management";
    }

    public function index(PageRequest $request)
    {
        $this->data['records'] = User::paginate(10);

        return view('backoffice.user-account-management.index', $this->data);
    }

    public function edit(PageRequest $request, $id = null)
    {
        $this->data['record'] = User::findOrFail($id);

        return view('backoffice.user-account-management.edit', $this->data);
    }

    public function update(UserAccountUpdateRequest $request, $id = null)
    {
        DB::beginTransaction();

        try {
            $user = User::findOrFail($id);
            $user->name = strtoupper($request->input('name'));
            $user->email = strtolower($request->input('email'));
            $user->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "User account successfully updated.");
            return redirect()->route('backoffice.user_account_management.index');
        } catch (\Exception $e) {
            DB::rollback();

            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }

    public function password(PageRequest $request, $id = null)
    {
        $this->data['record'] = User::findOrFail($id);

        return view('backoffice.user-account-management.password', $this->data);
    }

    public function updatePassword(UserAccountPasswordRequest $request, $id = null)
    {
        DB::beginTransaction();

        try {
            $user = User::findOrFail($id);
            $user->password = bcrypt($request->input('password'));
            $user->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "User password successfully updated.");
            return redirect()->route('backoffice.user_account_management.edit', $user->id);
        } catch (\Exception $e) {
            DB::rollback();

            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }

    public function show(PageRequest $request, $id = null)
    {
        $this->data['record'] = User::findOrFail($id);

        return view('backoffice.user-account-management.show', $this->data);
    }

    public function delete(PageRequest $request, $id = null)
    {
        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('notification-status', "success");
        session()->flash('notification-msg', "User account successfully deleted.");
        return redirect()->route('backoffice.user_account_management.index');
    }
}
