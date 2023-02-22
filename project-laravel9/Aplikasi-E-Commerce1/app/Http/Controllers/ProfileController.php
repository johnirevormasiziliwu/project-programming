<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show_profile()
    {
        $user = Auth::user();
        return view('Ecommerce.profile.show_profile', compact('user'));
    }

    public function edit_profile()
    {
        $user = Auth::user();
        return view('Ecommerce.profile.edit_profile', compact('user'));
    }

   

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'password' => 'required|min:3|max:255|confirmed',
            'email' => 'required|email:dns|max:255',
            'username' => 'required|max:255'
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'username' => $request->username
        ]);

        dd($user);
    

        return redirect(route('show_profile'));
        
    }
}