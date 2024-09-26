<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Visitor;

class VisitorCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $visitor;
    public $qrCodeFilename;

    /**
     * Create a new message instance.
     *
     * @param Visitor $visitor
     */
    public function __construct(Visitor $visitor)
    {
        $this->visitor = $visitor;
        $this->qrCodeFilename = $visitor->qr_code_filename;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Visitor Registration Successful')
                    ->view('emails.visitor_created')
                    ->with([
                        'visitorName' => $this->visitor->visitor_name,
                        'visitingDate' => $this->visitor->visiting_date,
                        'startTime' => $this->visitor->start_time,
                        'endTime' => $this->visitor->end_time,
                        'qrCodeFilename' => $this->qrCodeFilename,
                    ]);
    }
}
