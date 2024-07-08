<?php

namespace App\Http\Controllers\Marchentiger;

use App\Http\Controllers\Controller;
use App\Models\Retailer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PageController extends Controller
{
    public function dashboard()
    {

        return view('auth.marchentiger.dashboard');
    }
    public function createOrUpdate(Request $request)
    {
        $data = $request->validate([
            'email' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'division' => 'nullable|string|max:255',
            'zilla' => 'nullable|string|max:255',
            'upzilla' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'post_code' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'percentage_cost' => 'nullable|numeric',
            'total_own' => 'nullable|numeric',
            'total_withdraw' => 'nullable|numeric',
            'status' => 'nullable|integer',
        ]);

        $user = auth()->user();
        $retailer = $user->retailer;

        if ($request->hasFile('logo')) {
            if ($retailer->logo) {
                Storage::disk('public')->delete($retailer->logo);
            }

            $logoPath = $request->file('logo')->store('logos', 'public');

            $retailer->logo = $logoPath;
        }
        if ($request->hasFile('banner')) {
            if ($retailer->banner) {
                Storage::disk('public')->delete($retailer->banner);
            }
            $bannerPath = $request->file('banner')->store('banners', 'public');
            $retailer->banner = $bannerPath;
        }
        if ($retailer) {
            $user->retailer->update($data);
        } else {
            $data['unique_id'] = Str::random(10);
            $user->retailer()->create($data);
        }

        return redirect()->back()->with('success_msg', 'Retailer information saved successfully.');
    }
    public function changePassword()
    {
        return view('auth.marchentiger.changePassword');
    }
    public function update_password(Request $request)
    {

        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success_msg', 'Password changed successfully');
    }
}
