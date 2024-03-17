<?php

namespace App\Services;

use \MailchimpMarketing\ApiClient;
class Newsletter
{
    public function subscribe(string $email)
    {
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us10',
        ]);

        return $mailchimp->lists->addListMember('a966348411', [
            'email_address' => $email,
            'status' => 'subscribed',
        ]);
    }
}
