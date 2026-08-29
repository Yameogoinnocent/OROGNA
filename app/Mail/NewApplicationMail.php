<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Application $application)
    {
    }

    public function build()
    {
        $jobTitle = $this->application->jobOffer ? $this->application->jobOffer->title : 'Candidature spontanée';

        return $this->subject('Nouvelle candidature : ' . $this->application->candidate_name)
            ->html("
                <h2>Nouvelle candidature reçue</h2>
                <p><strong>Poste / Intitulé :</strong> {$jobTitle}</p>
                <p><strong>Candidat :</strong> {$this->application->candidate_name}</p>
                <p><strong>Email :</strong> {$this->application->candidate_email}</p>
                <p><strong>Téléphone :</strong> {$this->application->phone}</p>
                <p><strong>Message / Motivation :</strong></p>
                <blockquote style='background:#f4f6f3;padding:12px;border-left:4px solid #ef8b00;'>".nl2br(e($this->application->message))."</blockquote>
            ");
    }
}
