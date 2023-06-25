<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CahierDeChargeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cahiers;

    public function __construct($cahiers)
    {
        $this->cahiers = $cahiers;
    }

    public function build()
    {
        return $this->markdown('emails.cahier_de_charge')
            ->with([
                'domaine' => $this->cahiers['domaine'],
                'themes' => $this->cahiers['themes'],
                'recommandations' => $this->cahiers['recommandations'],
                'mode' => $this->cahiers['mode'],
                'duree' => $this->cahiers['duree'],
                'date' => $this->cahiers['date'],
                'personnel' => $this->cahiers['personnel'],
                'profil' => $this->cahiers['profil'],
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cahier De Charge',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.cahier_de_charge',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
