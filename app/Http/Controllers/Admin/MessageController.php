<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        $items = ContactMessage::latest()->paginate(15);
        return view('admin.messages.index', compact('items'));
    }

    public function markAsRead(ContactMessage $message)
    {
        $message->update(['is_read' => true]);
        return back();
    }

    public function reply(Request $request, ContactMessage $message)
    {
        $data = $request->validate([
            'reply' => 'required|string|max:10000',
        ]);

        $subject = $message->subject
            ? 'Re: ' . $message->subject
            : 'Réponse à votre message — OROGNA Consulting';

        try {
            Mail::raw($data['reply'], function ($mail) use ($message, $subject) {
                $mail->from(
                    SiteSetting::value('email', config('mail.from.address')),
                    SiteSetting::value('site_name', 'OROGNA Consulting')
                )->to($message->email)
                 ->subject($subject)
                 ->replyTo(
                     SiteSetting::value('email', config('mail.from.address')),
                     SiteSetting::value('site_name', 'OROGNA Consulting')
                 );
            });
        } catch (\Throwable $e) {
            report($e);
            return back()->with('error', 'La réponse n’a pas pu être envoyée. Vérifiez la configuration email du site.');
        }

        $message->update([
            'reply' => $data['reply'],
            'replied_at' => now(),
            'is_read' => true,
        ]);

        return back()->with('success', 'Réponse envoyée à ' . $message->email . '.');
    }
}
