<?php

namespace Theme\Templates;

use GeniePress\Interfaces\GenieComponent;
use GeniePress\Utilities\RegisterAjax;
use GeniePress\Utilities\SendEmail;
use GeniePress\View;

class ContactForm implements GenieComponent
{

    /**
     * Setup!
     */
    public static function setup()
    {
        RegisterAjax::url('contact-form')
            ->run(function (string $email, string $name, string $message) {
                $body = View::with('emails/contact-form.twig')
                    ->addVars(compact('email', 'name', 'message'))
                    ->render();

                SendEmail::to(get_option('admin_email'))
                    ->body($body)
                    ->subject('Thank you for your enquiry')
                    ->send();

                return [
                    'sent' => true,
                ];
            });
    }

}
