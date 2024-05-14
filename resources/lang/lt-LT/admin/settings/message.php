<?php

return [

    'update' => [
        'error'                 => 'Atnaujinant iškilo nenumatyta problema. ',
        'success'               => 'Nustatymai sėkmingai atnaujinti.',
    ],
    'backup' => [
        'delete_confirm'        => 'Ar tikrai norite ištrinti atsarginę kopiją? Šis veiksmas negalimas. ',
        'file_deleted'          => 'Atsarginė kopija sėkmingai ištrinta. ',
        'generated'             => 'Atsarginė kopija sėkmingai sukurta.',
        'file_not_found'        => 'Atsarginė kopija nerasta.',
        'restore_warning'       => 'Yes, restore it. I acknowledge that this will overwrite any existing data currently in the database. This will also log out all of your existing users (including you).',
        'restore_confirm'       => 'Are you sure you wish to restore your database from :filename?'
    ],
    'purge' => [
        'error'     => 'Išvalant įvyko klaida.',
        'validation_failed'     => 'Jūsų valymo patvirtinimas yra neteisingas. Patvirtinimo laukelyje įrašykite žodį "DELETE".',
        'success'               => 'Ištrinti įrašai sėkmingai išvalomi.',
    ],
    'mail' => [
        'sending' => 'Sending Test Email...',
        'success' => 'El. laiškas išsiųstas!',
        'error' => 'El. laiško išsiųsti nepavyko.',
        'additional' => 'No additional error message provided. Check your mail settings and your app log.'
    ],
    'ldap' => [
        'testing' => 'Testing LDAP Connection, Binding & Query ...',
        '500' => '500 Server Error. Please check your server logs for more information.',
        'error' => 'Kažkas nepavyko :(',
        'sync_success' => 'A sample of 10 users returned from the LDAP server based on your settings:',
        'testing_authentication' => 'Testing LDAP Authentication...',
        'authentication_success' => 'User authenticated against LDAP successfully!'
    ],
    'webhook' => [
        'sending' => 'Sending :app test message...',
        'success' => 'Your :webhook_name Integration works!',
        'success_pt1' => 'Sėkmė! Patikrink ',
        'success_pt2' => ' channel for your test message, and be sure to click SAVE below to store your settings.',
        '500' => '500 serverio klaida.',
        'error' => 'Something went wrong. :app responded with: :error_message',
        'error_redirect' => 'ERROR: 301/302 :endpoint returns a redirect. For security reasons, we don’t follow redirects. Please use the actual endpoint.',
        'error_misc' => 'Kažkas nepavyko. :( ',
    ]
];
