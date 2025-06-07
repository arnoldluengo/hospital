<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('profile_photo')) {
            try {
                // Create directory if it doesn't exist
                $path = public_path('admin/assets/images/profile');
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0777, true);
                }

                // Delete old profile photo if exists
                if ($user->profile_photo_path) {
                    $oldPhotoPath = public_path('admin/assets/images/profile/' . $user->profile_photo_path);
                    if (File::exists($oldPhotoPath)) {
                        File::delete($oldPhotoPath);
                    }
                }

                // Store new profile photo
                $file = $request->file('profile_photo');
                $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                
                // Move the file
                $file->move($path, $fileName);
                
                // Update user profile photo path
                $user->profile_photo_path = $fileName;
                
                // Log success
                \Log::info('Profile photo uploaded successfully: ' . $fileName);
            } catch (\Exception $e) {
                // Log error
                \Log::error('Error uploading profile photo: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Error uploading profile photo: ' . $e->getMessage());
            }
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
} 