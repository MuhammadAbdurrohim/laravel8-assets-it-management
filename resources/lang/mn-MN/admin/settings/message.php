<?php

return [

    'update' => [
        'error'                 => 'Шинэчлэлт хийх үед алдаа гарлаа.',
        'success'               => 'Тохиргоо амжилттай болсон.',
    ],
    'backup' => [
        'delete_confirm'        => 'Та энэ нөөц файлыг устгахыг хүсч байна уу? Энэ үйлдлийг буцаах боломжгүй.',
        'file_deleted'          => 'Нөөц файл амжилттай устгагдсан байна.',
        'generated'             => 'Шинэ нөөц файл амжилттай болсон.',
        'file_not_found'        => 'Энэ нөөц файлыг сервер дээрээс олж чадсангүй.',
        'restore_warning'       => 'Yes, restore it. I acknowledge that this will overwrite any existing data currently in the database. This will also log out all of your existing users (including you).',
        'restore_confirm'       => 'Are you sure you wish to restore your database from :filename?'
    ],
    'purge' => [
        'error'     => 'Цэвэрлэх явцад алдаа гарлаа.',
        'validation_failed'     => 'Таны таслалтын баталгаа буруу байна. Баталгаажуулалтын хайрцагт "DELETE" үгийг оруулна уу.',
        'success'               => 'Устсан бүртгэлийг амжилттай цэвэрлэж байна.',
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
