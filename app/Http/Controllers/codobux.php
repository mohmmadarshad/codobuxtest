<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class codobux extends Controller
{
    //

    public function formsubmit(Request $request)
    {
        $rules = [
            "name" => "required",
            "phone" => "required",
            "password" => "required",
            "email" => "required|unique:Users,email",
        ];

        $valid = Validator::make($request->all(), $rules);
        $valid->validate();
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid);
        } else {
            $filepath = '';
            if ($request->hasFile('image')) {
                $profileImage = $request->file('image');
                $distinationDir = public_path('uploads/');
                $name = time() . '.' . $profileImage->getClientOriginalExtension();
                $profileImage->move($distinationDir, $name);
                $filepath = $name;
            }
            $userCreate = userModel::create([
                'name' => $request->name,
                'phoneNo' => $request->phone,
                'password' => $request->password,
                'email' => $request->email,
                'image'=>$filepath
            ]);
            if ($userCreate) {
                return redirect()->back()->with('success', 'Your have successfully Subscribe...');
            } else {
                return redirect()->back()->with('error', 'Error Subscribe...');
            }
        }

    }
}

