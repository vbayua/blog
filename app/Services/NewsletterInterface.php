<?php

namespace App\Services;


interface NewsletterInterface
{
    public function subscribe(string $email = null,  string $list = null);
}
