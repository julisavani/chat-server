<?php

namespace App\Http\Controllers;
require_once '/path/to/vendor/autoload.php';

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Swift_Mailer;
use Swift_Message;
use Swift_SendmailTransport;
use Swift_SmtpTransport;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function mail(){

        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.example.org', 25))
        ->setUsername('your username')
        ->setPassword('your password')
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('Wonderful Subject'))
        ->setFrom(['john@doe.com' => 'John Doe'])
        ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
        ->setBody('Here is the message itself')
        ;

        // Send the message 123456
        $result = $mailer->send($message);
        $transport = new Swift_SendmailTransport('/usr/sbin/sendmail -bs');
    }

}
