<?php

namespace App\Mail;

use App\Models\Tenant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TenantApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tenant;

    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

   public function build()
{
    $url = url('/register-admin/' . $this->tenant->register_token);

    return $this->subject('Tu solicitud fue aprobada 🎉')
        ->view('emails.tenant-approved', [
            'url' => $url,
        ]);
}
}