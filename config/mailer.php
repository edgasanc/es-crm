<?php

return [
    //'class' => 'yii\swiftmailer\Mailer',
    // send all mails to a file by default. You have to set
    // 'useFileTransport' to false and configure a transport
    // for the mailer to send real emails.
    //'useFileTransport' => true,
    'class' => 'yii\swiftmailer\Mailer',
    'viewPath' => '@app/mailer',
    'useFileTransport' => false,
    'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => 'smtp.gmail.com',
        'username' => 'pruebasdesw@gmail.com',
        'password' => 'cafecolombia2014',
        'port' => '587',
        'encryption' => 'tls',
    ],
];