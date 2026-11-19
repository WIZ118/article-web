<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Requests\PageRequest;
use App\Laravel\Models\Admin;
use Illuminate\Support\Facades\DB;
use App\Laravel\Requests\Backoffice\AdminAccountRequest;
use App\Laravel\Requests\Backoffice\AdminAccountUpdateRequest;

class AccountManagementController extends Controller
{
    public function __construct()
    {
        $this->data['page-title'] = "Account Management";
    }

    public function index(PageRequest $request)
    {
        $this->data['records'] = Admin::paginate(10);

        return view('backoffice.account-management.index', $this->data);
    }




    public function create(PageRequest $request)
    {
        return view('backoffice.account-management.create', $this->data);
    }

    public function store(AdminAccountRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = new Admin();
            $user->name = strtoupper($request->input('name'));
            $user->email = strtolower($request->input('email'));
            $user->password = bcrypt($request->input('password'));
            $user->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Successfully registered. Please login to continue.");
            return redirect()->route('backoffice.account_management.index');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }

    public function edit(PageRequest $request, $id = null)
    {
        $this->data['record'] = Admin::find($id);

        return view('backoffice.account-management.edit', $this->data);
    }

    public function update(AdminAccountUpdateRequest $request, $id = null)
    {
        DB::beginTransaction();

        try {
            $user = Admin::find($id);
            $user->name = strtoupper($request->input('name'));
            $user->email = strtolower($request->input('email'));
            $user->password = bcrypt($request->input('password'));
            $user->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Successfully updated.");
            return redirect()->route('backoffice.account_management.index');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }

    public function show(PageRequest $request, $id = null)
    {
        $this->data['record'] = Admin::find($id);

        return view('backoffice.account-management.show', $this->data);
    }
}
