<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function admin_logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notif = array(
            'message'       => 'Logout Successfully',
            'alert-type'    => 'success',
        );

        return redirect('/admin/logout/page')->with($notif);
    }

    public function admin_logout_page()
    {
        return view('backend.logout');
    }

    public function admin_profile()
    {
        return view('backend.profile');
    }


    public function update_info(Request $request)
    {
        $data = User::find(Auth::id());

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {

            $file = $request->file('photo');

            @unlink(public_path('/uploads/user/' . $data->photo));

            $file_name = date('YmdHi') . '.' . $file->getClientOriginalName();

            $file->move(public_path('/uploads/user/'), $file_name);

            $data['photo']  = $file_name;
        }

        $data->save();

        $notif = array(
            'message'         => 'Profile Info Updated Successfully',
            'alert-type'      => 'success',
        );

        return back()->with($notif);
    }

    function update_password(Request $request)
    {
        if (Hash::check($request->password, Auth::user()->password)) {
            if ($request->new_password !== '') {
                User::find(Auth::id())->update([
                    'password' => Hash::make($request->new_password),
                ]);

                $notif = array(
                    'message'       => 'Password Updated',
                    'alert-type'    => 'success',
                );

                return back()->with($notif);
            }
        } else {

            $notif = array(
                'message'       => 'Old password does not match',
                'alert-type'    => 'error',
            );

            return back()->with($notif);
        }
    }
}
