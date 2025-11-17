<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
class ContactController extends Controller
{
    public function show()
    {
        return view('guest.contact-us');
    }
   public function store(Request $request)
{
    $data = $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email',
        'phone'   => 'nullable|string|max:20',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);

    // 1️⃣ Save in DB
    $message = ContactMessage::create($data);

    try {
        // 2️⃣ Load SMTP settings from DB
        $settings = Setting::firstWhere('smtp_active', 1);
        if ($settings) {
            Config::set('mail.mailers.smtp.transport', 'smtp');
            Config::set('mail.mailers.smtp.host', $settings->mail_host);
            Config::set('mail.mailers.smtp.port', $settings->mail_port);
            Config::set('mail.mailers.smtp.encryption', $settings->mail_encryption);
            Config::set('mail.mailers.smtp.username', $settings->mail_username);
            Config::set('mail.mailers.smtp.password', $settings->mail_password);

            Config::set('mail.from.address', $settings->mail_from_address);
            Config::set('mail.from.name', $settings->mail_from_name);
        }

        // 3️⃣ Try sending email
        Mail::send('emails.contact', ['data' => $data], function ($mail) use ($data, $settings) {
            $mail->to($settings->email ?? 'mughees430@gmail.com')
                 ->subject($data['subject'] ?? 'New Contact Message');
        });

        return back()->with('success', '✅ Your message has been sent successfully!');

    } catch (\Exception $e) {
        // Log the error for debugging
        Log::error('Mail sending failed: ' . $e->getMessage());

        return back()->with('error', '❌ Failed to send your message. Please try again later.');
    }
}

}
