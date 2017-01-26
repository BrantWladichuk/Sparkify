<?php
namespace Brantwladichuk\Sparkify;

use Brantwladichuk\Sparkify\Jobs\SendSpark;

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

        // Add the user's name to the substitute_data
        $substituteData['name'] = trim($this->{$firstNameColumn} . ' ' . $this->{$LastNameColumn});

        $postFields = [
            "recipients" => [
                [
                    "address" => $this->{$emailColumn},
                    "substitution_data"=> $substituteData
                ]
            ],
            "content" => [
                "template_id" => $template
            ]
        ];

        dispatch(new SendSpark($postFields));
    }
}
