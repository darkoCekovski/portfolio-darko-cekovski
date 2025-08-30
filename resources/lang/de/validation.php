<?php

return [
    'required' => ':attribute ist erforderlich.',
    'string' => ':attribute muss eine Zeichenkette sein.',
    'email' => ':attribute muss eine gültige E-Mail-Adresse sein.',
    'max' => [
        'string' => ':attribute darf nicht länger als :max Zeichen sein.',
    ],

    'attributes' => [
        'name' => __('messages.contact_name_label'),
        'email' => __('messages.contact_email_label'),
        'comment' => __('messages.contact_message_label'),
    ],
];
