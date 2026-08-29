<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactMessage $contactMessage)
    {
    }

    public function build()
    {
        return $this->subject('Nouveau message de contact — ' . $this->contactMessage->name)
            ->html("
                <h2>Nouveau message de contact reçu</h2>
                <p><strong>Nom :</strong> {$this->contactMessage->name}</p>
                <p><strong>Email :</strong> {$this->contactMessage->email}</p>
                <p><strong>Téléphone :</strong> {$this->contactMessage->phone}</p>
                <p><strong>Sujet :</strong> {$this->contactMessage->subject}</p>
                <p><strong>Message :</strong></p>
                <blockquote style='background:#f4f6f3;padding:12px;border-left:4px solid #79b94f;'>".nl2br(e($this->contactMessage->message))."</blockquote>
            ");
    }
}
