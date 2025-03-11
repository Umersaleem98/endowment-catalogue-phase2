<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\School;
use App\Models\Country;
use App\Models\SupportADegreeForOneYearUg;
use App\Models\DefaultPackageOneYearDegree;

class NotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;
    public $sub;
    public $students;
    public $schools;
    public $countries;
    public $postgraduate;
    public $undergraduate;
    public $attachmentPath; // New property for the attachment

    /**
     * Create a new message instance.
     */
    public function __construct($msg, $subject, $students, $schools, $countries, $undergraduate, $postgraduate, $attachmentPath = null)
    {
        $this->msg = $msg;
        $this->sub = $subject;
        $this->students = $students;
        $this->schools = $schools;
        $this->countries = $countries;
        $this->undergraduate = $undergraduate;
        $this->postgraduate = $postgraduate;
        $this->attachmentPath = $attachmentPath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->sub,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
           
            view: 'Email'
           
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        $attachments = [];
        if ($this->attachmentPath) {
            // Attach the file by specifying its path
            $attachments[] = $this->attachmentPath;
        }
        return $attachments;
    }
}