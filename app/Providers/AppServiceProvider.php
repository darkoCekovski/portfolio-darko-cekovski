<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Mail::extend('smtp', function (array $config) {
            $transport = new EsmtpTransport(
                $config['host'],
                $config['port'] ?? 587,
                ($config['encryption'] ?? null) === 'ssl',
            );

            $transport->setUsername($config['username']);
            $transport->setPassword($config['password']);

            $transport->getStream()->setStreamOptions([
                'ssl' => [
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true,
                ],
            ]);

            return $transport;
        });
    }
}
