<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Part\HtmlPart;



class AuthController extends Controller
{
    public function AdminLogin(Request $request)
    {
        // Validate the request inputs (email must be valid and both fields required)
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the admin exists and is explicitly deactivated (status = 0)
        $admin = Admin::where('email', $request->email)->where('status', 0)->first();
        if ($admin) {
            // If deactivated, show error message with appropriate status icon
            return back()->with('message', 'Your Account is deactivated contact admin.')
                ->with('status', asset('assets/icon/error.gif'));
        }

        // Check if the admin exists regardless of status
        $admin = Admin::where('email', $request->email)->first();

        // If no admin found, return with invalid email message
        if (!$admin) {
            return back()->with('message', 'Invalid email address.')
                ->with('status', asset('assets/icon/error.gif'));
        }

        // If admin status is not active (i.e., not 1), return warning
        if ($admin->status != 1) {
            return back()->with('message', 'You are deactivated!')
                ->with('status', asset('assets/icon/warning.png'));
        }

        // Attempt login using admin guard
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // ✅ Redirect to admin dashboard if login successful
            return redirect()->route('admins.index')
                ->with('message', 'Welcome, login successful')
                ->with('status', asset('assets/icon/success.gif'));
        }

        // If login failed (password mismatch), return with error
        return back()->with('message', 'Invalid password')
            ->with('status', asset('assets/icon/error.gif'));
    }

    public function AdminLogout()
    {
        // Log out the currently authenticated admin user
        Auth::logout();

        // 🔁 Redirect to the login page with a success message and icon
        return redirect('/login')
            ->with('message', 'Successfully Logged Out')
            ->with('status', asset('assets/icon/success.gif'));
    }
}
