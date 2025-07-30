<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Paiement;

class PaymentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $paiement;

    public function __construct(Paiement $paiement)
    {
        $this->paiement = $paiement;
    }

    public function build()
    {
        return $this->subject('Confirmation de votre paiement #'.$this->paiement->transaction_id)
                    ->view('emails.payment_confirmation')
                    ->with([
                        'paiement' => $this->paiement,
                        'user' => $this->paiement->user
                    ]);
    }
}
