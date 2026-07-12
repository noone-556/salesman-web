<?php
// app/Services/WhatsAppService.php

namespace App\Services;

use Twilio\Rest\Client;

class WhatsAppService
{
    protected Client $client;
    protected string $from;

    public function __construct()
    {
        $this->client = new Client(
            config('services.twilio.sid'),
            config('services.twilio.auth_token')
        );

        $this->from = config('services.twilio.whatsapp_from');
    }

    public function send(string $toPhone, string $message): mixed
    {
        // Sandbox expects E.164 format, e.g. +60123456789
        $to = 'whatsapp:' . $this->normalizePhone($toPhone);

        return $this->client->messages->create($to, [
            'from' => $this->from,
            'body' => $message,
        ]);
    }

    protected function normalizePhone(string $phone): string
    {
        // Converts "012-345 6789" -> "+60123456789"
        $digits = preg_replace('/[^0-9]/', '', $phone);

        // Strip leading 0, add Malaysia country code
        if (str_starts_with($digits, '0')) {
            $digits = '60' . substr($digits, 1);
        }

        return '+' . $digits;
    }
}