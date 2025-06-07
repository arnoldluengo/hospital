<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LogoController extends Controller
{
    public function showLogoSettings()
    {
        return view('admin.logo-settings');
    }

    public function updateLogo(Request $request)
    {
        $request->validate([
            'main_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mini_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // Create directory if it doesn't exist
            $path = public_path('admin/assets/images');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0777, true);
            }

            // Handle main logo upload
            if ($request->hasFile('main_logo')) {
                // Delete old logo if exists
                if (File::exists(public_path('admin/assets/images/logo.png'))) {
                    File::delete(public_path('admin/assets/images/logo.png'));
                }

                // Store new logo
                $mainLogo = $request->file('main_logo');
                $mainLogo->move($path, 'logo.png');
            }

            // Handle mini logo upload
            if ($request->hasFile('mini_logo')) {
                // Delete old mini logo if exists
                if (File::exists(public_path('admin/assets/images/logo-mini.png'))) {
                    File::delete(public_path('admin/assets/images/logo-mini.png'));
                }

                // Store new mini logo
                $miniLogo = $request->file('mini_logo');
                $miniLogo->move($path, 'logo-mini.png');
            }

            return redirect()->back()->with('success', 'Logo updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating logo: ' . $e->getMessage());
        }
    }
} 