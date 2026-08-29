<?php

namespace App\Http\Controllers;

use App\Mail\NewContactMessageMail;
use App\Models\ContactMessage;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:160',
            'phone' => 'nullable|string|max:40',
            'subject' => 'nullable|string|max:180',
            'message' => 'required|string|max:5000',
        ]);

        $message = ContactMessage::create($data);

        $adminEmail = SiteSetting::value('email', config('mail.from.address'));
        if ($adminEmail) {
            try {
                Mail::to($adminEmail)->send(new NewContactMessageMail($message));
            } catch (\Throwable $e) {
                report($e);
            }
        }

        return back()->with('success', 'Votre message a bien été envoyé. Notre équipe vous répondra rapidement.');
    }
}
