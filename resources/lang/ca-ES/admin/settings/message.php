<?php

return [

    'update' => [
        'error'                 => 'An error has occurred while updating. ',
        'success'               => 'Settings updated successfully.',
    ],
    'backup' => [
        'delete_confirm'        => 'Are you sure you would like to delete this backup file? This action cannot be undone. ',
        'file_deleted'          => 'The backup file was successfully deleted. ',
        'generated'             => 'A new backup file was successfully created.',
        'file_not_found'        => 'That backup file could not be found on the server.',
        'restore_warning'       => 'Yes, restore it. I acknowledge that this will overwrite any existing data currently in the database. This will also log out all of your existing users (including you).',
        'restore_confirm'       => 'Are you sure you wish to restore your database from :filename?'
    ],
    'purge' => [
        'error'     => 'An error has occurred while purging. ',
        'validation_failed'     => 'Your purge confirmation is incorrect. Please type the word "DELETE" in the confirmation box.',
        'success'               => 'Deleted records successfully purged.',
    ],
    'mail' => [
        'sending' => 'Sending Test Email...',
        'success' => 'Mail sent!',
        'error' => 'Mail could not be sent.',
        'additional' => 'No additional error message provided. Check your mail settings and your app log.'
    ],
    'ldap' => [
        'testing' => 'Testing LDAP Connection, Binding & Query ...',
        '500' => '500 Server Error. Please check your server logs for more information.',
        'error' => 'Something went wrong :(',
        'sync_success' => 'A sample of 10 users returned from the LDAP server based on your settings:',
        'testing_authentication' => 'Testing LDAP Authentication...',
        'authentication_success' => 'User authenticated against LDAP successfully!'
    ],
    'webhook' => [
        'sending' => 'Sending :app test message...',
        'success' => 'Your :webhook_name Integration works!',
        'success_pt1' => 'Success! Check the ',
        'success_pt2' => ' channel for your test message, and be sure to click SAVE below to store your settings.',
        '500' => '500 Server Error.',
        'error' => 'Something went wrong. :app responded with: :error_message',
        'error_redirect' => 'ERROR: 301/302 :endpoint returns a redirect. For security reasons, we don’t follow redirects. Please use the actual endpoint.',
        'error_misc' => 'Something went wrong. :( ',
    ]
];
