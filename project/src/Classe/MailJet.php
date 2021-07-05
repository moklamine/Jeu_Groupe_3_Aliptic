<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;

class MailJet
{
    private $api_key = 'cdbb57806dbb506b3acfcbbae59b2e0b';
    private $api_key_secret= '5586194fac32a3a00f0bf24e23ff951f';

    public function send($to_email, $to_name, $subject, $content)
    {
        $mj = new Client($this->api_key, $this->api_key_secret, true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "latourgalamadriabuyak@outlook.fr",
                        'Name' => "La Tour Galamadriabuyak"
                    ],
                    'To' => [
                        [
                            'Email' => $to_email,
                            'Name' => $to_name
                        ]
                    ],
                    'TemplateID' => 2983801,
                    'TemplateLanguage' => true,
                    'Subject' => $subject,
                    'Variables' => [
                        'content' => $content,
                    ]
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
    }
}