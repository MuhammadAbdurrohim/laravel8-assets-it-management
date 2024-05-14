<?php

return [

    'update' => [
        'error'                 => 'Ett fel har uppstått under uppdateringen.',
        'success'               => 'Inställningarna uppdaterades framgångsrikt.',
    ],
    'backup' => [
        'delete_confirm'        => 'Är du säker på att du vill ta bort den här säkerhetskopieringsfilen? Den här åtgärden kan inte ångras.',
        'file_deleted'          => 'Säkerhetsfilen har tagits bort.',
        'generated'             => 'En ny säkerhetskopieringsfil skapades med framgång.',
        'file_not_found'        => 'Den säkerhetskopieringsfilen kunde inte hittas på servern.',
        'restore_warning'       => 'Ja, återställ den. Jag är medveten att detta kommer att skriva över befintliga data som finns i databasen. Detta kommer också att logga ut alla dina befintliga användare (inklusive dig).',
        'restore_confirm'       => 'Är du säker på att du vill återställa din databas från :filnamn?'
    ],
    'purge' => [
        'error'     => 'Ett fel har uppstått vid spolning.',
        'validation_failed'     => 'Din rengöringsbekräftelse är felaktig. Vänligen skriv ordet "DELETE" i bekräftelsen rutan.',
        'success'               => 'Raderade poster som rensats framgångsrikt.',
    ],
    'mail' => [
        'sending' => 'Skicka Testmeddelande...',
        'success' => 'E-post skickat!',
        'error' => 'Mailet kunde inte skickas.',
        'additional' => 'Inga ytterligare felmeddelanden tillhandahålls. Kontrollera dina e-postinställningar och din app-logg.'
    ],
    'ldap' => [
        'testing' => 'Testar LDAP-anslutning, bindning och fråga ...',
        '500' => '500 Serverfel. Kontrollera dina serverloggar för mer information.',
        'error' => 'Något gick fel :(',
        'sync_success' => 'Ett urval av 10 användare som returneras från LDAP-servern baserat på dina inställningar:',
        'testing_authentication' => 'Testar LDAP-autentisering...',
        'authentication_success' => 'Användaren är autentiserad mot LDAP framgångsrikt!'
    ],
    'webhook' => [
        'sending' => 'Skickar :app testmeddelande...',
        'success' => 'Din :webhook_name Integration fungerar!',
        'success_pt1' => 'Klart! Kontrollera ',
        'success_pt2' => ' kanal för ditt testmeddelande, och se till att klicka på SPARA nedan för att lagra dina inställningar.',
        '500' => '500 Server fel.',
        'error' => 'Något gick fel. :app svarade med: :error_message',
        'error_redirect' => 'FEL: 301/302 :endpoint returnerar en omdirigering. Av säkerhetsskäl följer vi inte omdirigeringar. Använd själva slutpunkten.',
        'error_misc' => 'Någonting gick fel. :( ',
    ]
];
