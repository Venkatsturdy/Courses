<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of admin users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $admins = Admin::orderBy('id', 'desc')->get();
        return view('admin.users', compact('admins'));
    }

    /**
     * Show the form for creating a new admin user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.new_user');
    }

    /**
     * Store a newly created admin user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            "name" => "required",
            'password' => 'required|string|min:6|confirmed',
            "email" => "required|unique:admins"
        ]);

        // Create and save the new admin
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->password = Hash::make($request->password);
        $admin->email = $request->email;
        $admin->save();

        return redirect(route('admins.index'))
            ->with('message', 'Admin added Successfully')
            ->with('status', asset('assets/icon/success.gif'));
    }

    /**
     * Show the form for editing the specified admin user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit_user', compact('admin'));
    }

    /**
     * Update the specified admin user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate incoming data
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:admins,email,$id",
            "password" => "nullable|string|min:6|confirmed",
        ]);

        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;

        // Update password only if provided
        if (!empty($request->password)) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admins.index')
            ->with('message', 'Admin Updated Successfully')
            ->with('status', asset('assets/icon/success.gif'));
    }

    /**
     * Display the specified admin user.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\View\View
     */
    public function show(Admin $admin)
    {
        return view('admin.show_user', compact('admin'));
    }

    /**
     * Toggle the active status of the specified admin user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus($id)
    {
        $admin = Admin::findOrFail($id);

        $admin->status = $admin->status == 1 ? 0 : 1;
        $message = $admin->status == 1
            ? 'Status Activated Successfully!'
            : 'Status Inactivated!!!';

        $admin->save();

        return back()
            ->with('message', $message)
            ->with('status', asset('assets/icon/success.gif'));
    }

    /**
     * Remove the specified admin user from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Admin $admin, $id)
    {
        $removeAdmin = Admin::find($id);
        $removeAdmin->delete();

        return redirect(route('admins.index'))
            ->with('message', 'Admin User Deleted Successfully')
            ->with('status', asset('assets/icon/delete.gif'));
    }
}
