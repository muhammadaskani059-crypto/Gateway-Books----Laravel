<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use App\Models\User;
use Auth;
use File;

class HomeController extends Controller
{
    function profile()
    {
        return view('admin/user_profile/profile');
    }

    function profile_update(Request $request)
    {
        $user = Auth::user();

        $fileName = $user->user_img;
        if (request()->hasFile('user_img')) {
            $file = request()->file('user_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);

            File::delete('./uploads/' . $user->user_img);
        }

    $user->update([
        'name'        => $request->name,
        'designation' => $request->designation,
        'bio'         => $request->bio,
        'email'       => $request->email,
        'user_img'    => $fileName,
    ]);
        return redirect()->back();
    }

    function update_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password']
        ]);

        User::find(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return response()->json([
            'status' => true,
            'msg' => ' Password Updated successfully!'
        ]);
    }
}