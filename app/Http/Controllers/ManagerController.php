<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index()
    {
        $manager = auth()->guard("manager")->user();
        return view('dashboard.manager.index', compact('manager'));
    }

    public function changeEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:managers,email'
        ]);

        $manager = auth()->guard("manager")->user();
        $manager->email = $request->email;
        $manager->save();

        return redirect()->back()->with('success-email', 'Email berhasil diubah');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);

        if (!Hash::check($request->old_password, auth()->guard("manager")->user()->password)) {
            return redirect()->back()->with('error', 'Password lama tidak sesuai');
        }

        $manager = auth()->guard("manager")->user();
        $manager->password = bcrypt($request->password);
        $manager->save();

        return redirect()->back()->with('success', 'Password berhasil diubah');
    }
}
