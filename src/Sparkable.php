<?php

namespace Brantwladichuk\Sparkify;

use BrantWladichuk\Sparkify\Jobs\SendSpark;

trait Sparkable {

    /**
     * Send the email.
     *
     * @param   string    $template_id
     * @param   array     $substituteData
     *
     * @return void
     */
    public function spark($template_id, $substituteData = [])
    {
        $firstNameColumn = config('sparkify.first_name_column');
        $lastNameColumn = config('sparkify.last_name_column');
        $emailColumn = config('sparkify.email_column');

        $substituteData['name'] = trim($this->{$firstNameColumn} . ' ' . $this->{$lastNameColumn});

        $postFields = [
            "recipients" => [
                [
                    "address" => $this->{$emailColumn},
                    "substitution_data"=> $substituteData
                ]
            ],
            "content" => [
                "template_id" => $template_id
            ]
        ];

        dispatch(new SendSpark($postFields));
    }
}
