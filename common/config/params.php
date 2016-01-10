<?php
return [
    'adminEmail' => getenv('ADMIN_EMAIL'),
    'supportEmail' => getenv('ADMIN_EMAIL'),
    'robotEmail' => getenv('ROBOT_EMAIL'),
    'user.passwordResetTokenExpire' => 3600,

    'cacheDuration' => 7200,

    // для модуля переводов
    'languages'=>[
        'ru'
    ],
];
