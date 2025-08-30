<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'required' => ':attribute field is required.',
    'string' => ':attribute must be a string.',
    'email' => ':attribute must be a valid email address.',
    'max' => [
        'string' => ':attribute may not be greater than :max characters.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => __('messages.contact_name_label'),
        'email' => __('messages.contact_email_label'),
        'comment' => __('messages.contact_message_label'),
    ],
];
