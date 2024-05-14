<?php

return [

    'undeployable' 		=> '<strong>Ievadīšana: </strong> Šis īpašums ir atzīmēts kā pašlaik nederīgs. Ja šis statuss ir mainījies, lūdzu, atjauniniet aktīvu statusu.',
    'does_not_exist' 	=> 'Aktīvs neeksistē.',
    'does_not_exist_or_not_requestable' => 'That asset does not exist or is not requestable.',
    'assoc_users'	 	=> 'Šobrīd šis īpašums tiek pārbaudīts lietotājam un to nevar izdzēst. Vispirms pārbaudiet aktīvu, un pēc tam mēģiniet vēlreiz izdzēst.',

    'create' => [
        'error'   		=> 'Īpašums netika izveidots, lūdzu, mēģiniet vēlreiz. :(',
        'success' 		=> 'Īpašums veiksmīgi izveidots. :)',
        'success_linked' => 'Asset with tag :tag was created successfully. <strong><a href=":link" style="color: white;">Click here to view</a></strong>.',
    ],

    'update' => [
        'error'   			=> 'Īpašums netika atjaunināts, lūdzu, mēģiniet vēlreiz',
        'success' 			=> 'Īpašums ir veiksmīgi atjaunināts.',
        'nothing_updated'	=>  'Lauki nav atlasīti, tāpēc nekas netika atjaunināts.',
        'no_assets_selected'  =>  'No assets were selected, so nothing was updated.',
        'assets_do_not_exist_or_are_invalid' => 'Selected assets cannot be updated.',
    ],

    'restore' => [
        'error'   		=> 'Īpašums netika atjaunots, lūdzu, mēģiniet vēlreiz',
        'success' 		=> 'Aktīvs veiksmīgi atjaunots.',
        'bulk_success' 		=> 'Aktīvs veiksmīgi atjaunots.',
        'nothing_updated'   => 'No assets were selected, so nothing was restored.', 
    ],

    'audit' => [
        'error'   		=> 'Aktīvu revīzija bija neveiksmīga. Lūdzu mēģiniet vēlreiz.',
        'success' 		=> 'Aktīvu audits ir veiksmīgi reģistrēts.',
    ],


    'deletefile' => [
        'error'   => 'Fails nav izdzēsts. Lūdzu mēģiniet vēlreiz.',
        'success' => 'Fails veiksmīgi izdzēsts.',
    ],

    'upload' => [
        'error'   => 'Faili nav augšupielādēti. Lūdzu mēģiniet vēlreiz.',
        'success' => 'Faili (-i) ir veiksmīgi augšupielādēti.',
        'nofiles' => 'Jūs neesat atlasījis augšupielādējamos failus, vai arī fails, kuru mēģināt augšupielādēt, ir pārāk liels',
        'invalidfiles' => 'Viens vai vairāki jūsu faili ir pārāk lieli vai nav atļauto faila tipu. Atļautie failu tipi ir png, gif, jpg, doc, docx, pdf un txt.',
    ],

    'import' => [
        'error'                 => 'Daži vienumi netika pareizi importēti.',
        'errorDetail'           => 'Tālāk minētie vienumi netika importēti kļūdu dēļ.',
        'success'               => 'Jūsu fails ir importēts',
        'file_delete_success'   => 'Jūsu fails ir veiksmīgi izdzēsts',
        'file_delete_error'      => 'Failu nevarēja dzēst',
        'file_missing' => 'The file selected is missing',
        'header_row_has_malformed_characters' => 'One or more attributes in the header row contain malformed UTF-8 characters',
        'content_row_has_malformed_characters' => 'One or more attributes in the first row of content contain malformed UTF-8 characters',
    ],


    'delete' => [
        'confirm'   	=> 'Vai tiešām vēlaties dzēst šo īpašumu?',
        'error'   		=> 'Radās problēma, noņemot aktīvu. Lūdzu mēģiniet vēlreiz.',
        'nothing_updated'   => 'Netika atlasīti neviens aktīvs, tāpēc nekas netika izdzēsts.',
        'success' 		=> 'Aktīvs tika veiksmīgi dzēsts.',
    ],

    'checkout' => [
        'error'   		=> 'Īpašums netika pārbaudīts, lūdzu, mēģiniet vēlreiz',
        'success' 		=> 'Aktīvs pārbaudīts veiksmīgi.',
        'user_does_not_exist' => 'Šis lietotājs ir nederīgs. Lūdzu mēģiniet vēlreiz.',
        'not_available' => 'Šis īpašums nav pieejams izrakstīšanai!',
        'no_assets_selected' => 'Jums jāizvēlas vismaz vienu aparatūru',
    ],

    'checkin' => [
        'error'   		=> 'Īpašums netika reģistrēts, lūdzu, mēģiniet vēlreiz',
        'success' 		=> 'Aktīvs ir pārbaudīts veiksmīgi.',
        'user_does_not_exist' => 'Šis lietotājs ir nederīgs. Lūdzu mēģiniet vēlreiz.',
        'already_checked_in'  => 'Šis aktīvs jau ir reģistrēts.',

    ],

    'requests' => [
        'error'   		=> 'Īpašums netika pieprasīts, lūdzu, mēģiniet vēlreiz',
        'success' 		=> 'Īpašums pieprasīts veiksmīgi.',
        'canceled'      => 'Norēķinu pieprasījums ir sekmīgi atcelts',
    ],

];
