<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Requests\PageRequest;
use App\Laravel\Models\Admin;
use Illuminate\Support\Facades\DB;
use App\Laravel\Requests\Backoffice\AdminAccountUpdateRequest;
use App\Laravel\Requests\Backoffice\AdminAccountPasswordRequest;

class AdminAccountManagementController extends Controller
{
    public function __construct()
    {
        $this->data['page-title'] = "Admin Account Management";
    }

    public function index(PageRequest $request)
    {
        $this->data['records'] = Admin::paginate(10);

        return view('backoffice.admin-account-management.index', $this->data);
    }

    public function edit(PageRequest $request, $id = null)
    {
        $this->data['record'] = Admin::findOrFail($id);

        return view('backoffice.admin-account-management.edit', $this->data);
    }

    public function update(AdminAccountUpdateRequest $request, $id = null)
    {
        DB::beginTransaction();

        try {
            $user = Admin::findOrFail($id);
            $user->name = strtoupper($request->input('name'));
            $user->email = strtolower($request->input('email'));
            $user->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Successfully updated.");
            return redirect()->route('backoffice.admin_account_management.index');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }

    public function password(PageRequest $request, $id = null)
    {
        $this->data['record'] = Admin::findOrFail($id);

        return view('backoffice.admin-account-management.password', $this->data);
    }

    public function updatePassword(AdminAccountPasswordRequest $request, $id = null)
    {
        DB::beginTransaction();

        try {
            $user = Admin::findOrFail($id);
            $user->password = bcrypt($request->input('password'));
            $user->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Admin password successfully updated.");
            return redirect()->route('backoffice.admin_account_management.edit', $user->id);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }

    public function show(PageRequest $request, $id = null)
    {
        $this->data['record'] = Admin::findOrFail($id);

        return view('backoffice.admin-account-management.show', $this->data);
    }

    public function delete(PageRequest $request, $id = null)
    {
        if ((int) $id === (int) Auth('admin')->id()) {
            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "You cannot delete the account currently in use.");
            return redirect()->route('backoffice.admin_account_management.index');
        }

        $user = Admin::findOrFail($id);
        $user->delete();

        session()->flash('notification-status', "success");
        session()->flash('notification-msg', "Admin account successfully deleted.");
        return redirect()->route('backoffice.admin_account_management.index');
    }
}
