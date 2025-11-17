<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\SocialLink;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first(); // only one row
        $socialLinks = SocialLink::orderBy('order')->get();

        return view('admin.setting.index', compact('setting', 'socialLinks'));
    }

    public function update(Request $request)
    {
        $setting = Setting::firstOrFail();

        // Update text fields (including SMTP fields)
        $setting->update($request->only([
            'site_name',
            'slogan',
            'phone',
            'email',
            'location',
            'address',
            'description',
            'made_with',
            'mail_mailer',
            'mail_host',
            'mail_port',
            'mail_username',
            'mail_password',
            'mail_encryption',
            'mail_from_address',
            'mail_from_name',
            'smtp_active',
        ]));

        // Handle logo uploads (save inside /public/uploads/logo)
        foreach (['logo', 'logo_light', 'logo_mobile', 'favicon'] as $field) {
            if ($request->hasFile($field)) {
                $filename = time() . '_' . $field . '.' . $request->file($field)->getClientOriginalExtension();
                $request->file($field)->move(public_path('uploads/logo'), $filename);

                // Save relative path (so you can use asset() in blade)
                $setting->update([$field => 'uploads/logo/' . $filename]);
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon'   => 'required|string|max:255',
            'title'  => 'required|string|max:255',
            'link'   => 'required|url|max:255',
            'order'  => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        // Ensure status always has a value (checkbox fix)
        $validated['status'] = $request->has('status') ? 1 : 0;

        SocialLink::create($validated);

        return back()->with('success', 'Social link added!');
    }

    public function updateSocailLink(Request $request, $id)
    {
        $validated = $request->validate([
            'icon'   => 'required|string|max:255',
            'title'  => 'required|string|max:255',
            'link'   => 'required|url|max:255',
            'order'  => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        // Ensure status always has a value
        $validated['status'] = $request->has('status') ? 0 : 1;

        $link = SocialLink::findOrFail($id);
        $link->update($validated);

        return back()->with('success', 'Social link updated!');
    }



    public function destroy($id)
    {
        SocialLink::findOrFail($id)->delete();
        return back()->with('success', 'Social link deleted!');
    }
}
