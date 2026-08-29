<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MessageReplyRequest;
use App\Models\ContactMessage;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        $q = request('q');
        $status = request('status');

        $items = ContactMessage::when($q, function ($query) use ($q) {
            $query->where(function ($w) use ($q) {
                $w->where('name', 'like', '%' . $q . '%')
                    ->orWhere('email', 'like', '%' . $q . '%')
                    ->orWhere('subject', 'like', '%' . $q . '%')
                    ->orWhere('message', 'like', '%' . $q . '%');
            });
        })
        ->when($status === 'unread', fn($query) => $query->where('is_read', false))
        ->when($status === 'read', fn($query) => $query->where('is_read', true))
        ->latest()
        ->paginate(15)
        ->withQueryString();

        return view('admin.messages.index', compact('items', 'q', 'status'));
    }

    public function markAsRead(ContactMessage $message)
    {
        $message->update(['is_read' => true]);
        return back();
    }

    public function reply(MessageReplyRequest $request, ContactMessage $message)
    {
        $data = $request->validated();

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
