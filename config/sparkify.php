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
    * first and last name. If you use one column to store the user's
    * full name. Put that as the first name and leave the last
    * name blank
    *
    *   Example: I store the user's full name in a column called username
    *       'first_name_column' => 'username'
    *       'last_name_column' => ''
    *
    */
    'first_name_column' => 'first_name',
    'last_name_column'  => 'last_name',

    /**
    *   The user's email column in the database
    */
    'email_column' => 'email'
];
