<?php

return [

    /**
     * Generate a new Api Key within your SparkPost Dashboard
     *
     * The only permission that should be selected is: Transmissions: Read-only
     */
    'sparkpost_api_key' => env('SPARKPOST_API_KEY'),


    /**
     * The columns in your database that correspond to the user's
     * first, last name and email. If you use one column to store the user's
     * full name. Put that as the first name and leave the last
     * name blank
     */
    'first_name_column' => 'first_name',

    'last_name_column'  => 'last_name',

    'email_column' => 'email'
];
