<?php

return [

    'undeployable' 		=> '<strong>Предупредување:</strong> Ова основно средство е означено како нераспоредливо. Ако овој статус е променет, ве молиме да го ажурирате статусот на средството.',
    'does_not_exist' 	=> 'Основното средство не постои.',
    'does_not_exist_or_not_requestable' => 'That asset does not exist or is not requestable.',
    'assoc_users'	 	=> 'Ова средство е задолжено на корисник и не може да се избрише. Проверете го, а потоа пробајте повторно да го избришете. ',

    'create' => [
        'error'   		=> 'Основното средство не е креирано, обидете се повторно. :(',
        'success' 		=> 'Основното средство е успешно креирано. :)',
        'success_linked' => 'Asset with tag :tag was created successfully. <strong><a href=":link" style="color: white;">Click here to view</a></strong>.',
    ],

    'update' => [
        'error'   			=> 'Основното средство не е ажурирано, обидете се повторно',
        'success' 			=> 'Основното средство е успешно ажурирано.',
        'nothing_updated'	=>  'Не беа избрани полиња, затоа ништо не беше ажурирано.',
        'no_assets_selected'  =>  'No assets were selected, so nothing was updated.',
        'assets_do_not_exist_or_are_invalid' => 'Selected assets cannot be updated.',
    ],

    'restore' => [
        'error'   		=> 'Основното средство не е вратено, обидете се повторно',
        'success' 		=> 'Основното средство е успешно вратено.',
        'bulk_success' 		=> 'Основното средство е успешно вратено.',
        'nothing_updated'   => 'No assets were selected, so nothing was restored.', 
    ],

    'audit' => [
        'error'   		=> 'Ревизијата на основни средства беше неуспешна. Обидете се повторно.',
        'success' 		=> 'Ревизијата на основни средства е логирана.',
    ],


    'deletefile' => [
        'error'   => 'Датотеката не се избриша. Обидете се повторно.',
        'success' => 'Датотеката е успешно избришана.',
    ],

    'upload' => [
        'error'   => 'Датотеките не се прикачени. Обидете се повторно.',
        'success' => 'Успешно се преземени датотеките.',
        'nofiles' => 'Не одбравте датотеки за прикачување, или датотеката што сакате да ја поставите е премногу голема',
        'invalidfiles' => 'Една или повеќе од вашите датотеки е преголема или е тип на датотека што не е дозволен. Дозволени типови на датотеки се png, gif, jpg, doc, docx, pdf и txt.',
    ],

    'import' => [
        'error'                 => 'Некои ставки не се увезоа правилно.',
        'errorDetail'           => 'Следниве елементи не се увезени поради грешки.',
        'success'               => 'Вашата датотека е увезена',
        'file_delete_success'   => 'Вашата датотека е избришана',
        'file_delete_error'      => 'Датотеката не можеше да се избрише',
        'file_missing' => 'The file selected is missing',
        'header_row_has_malformed_characters' => 'One or more attributes in the header row contain malformed UTF-8 characters',
        'content_row_has_malformed_characters' => 'One or more attributes in the first row of content contain malformed UTF-8 characters',
    ],


    'delete' => [
        'confirm'   	=> 'Дали сте сигурни дека сакате да го избришете ова основно средство?',
        'error'   		=> 'Имаше проблем со бришење на основното средство. Обидете се повторно.',
        'nothing_updated'   => 'Не беа избрани основни средства, затоа ништо не беше избришано.',
        'success' 		=> 'Основното средство беше избришано.',
    ],

    'checkout' => [
        'error'   		=> 'Основното средство не беше задолжено, обидете се повторно',
        'success' 		=> 'Основното средство е задолжено.',
        'user_does_not_exist' => 'Корисникот е неважечки. Обидете се повторно.',
        'not_available' => 'Основното средство не е достапно за задолжување!',
        'no_assets_selected' => 'Мора да одберете најмалку едно основно средство',
    ],

    'checkin' => [
        'error'   		=> 'Основното средство не беше раздолжено, обидете се повторно',
        'success' 		=> 'Основното средство е раздолжено.',
        'user_does_not_exist' => 'Корисникот е неважечки. Обидете се повторно.',
        'already_checked_in'  => 'Основното средство е веќе задолжено.',

    ],

    'requests' => [
        'error'   		=> 'Основното средство не е побарано, обидете се повторно',
        'success' 		=> 'Основното средство е побарано.',
        'canceled'      => 'Барањето за задолжување е откажано',
    ],

];
