<?php

return [

    'undeployable' 		=> '<strong>Opozorilo: </strong> To sredstvo je bilo označeno kot trenutno nerazdeljeno. Če se je ta status spremenil, posodobite status sredstva.',
    'does_not_exist' 	=> 'Sredstvo ne obstaja.',
    'does_not_exist_or_not_requestable' => 'That asset does not exist or is not requestable.',
    'assoc_users'	 	=> 'To sredstvo je trenutno izdano uporabniku in ga ni mogoče izbrisati. Najprej preverite sredstvo in poskusite znova izbrisati. ',

    'create' => [
        'error'   		=> 'Sredstvo ni bilo ustvarjeno, poskusite znova. :(',
        'success' 		=> 'Sredstvo je uspešno ustvarjeno. :)',
        'success_linked' => 'Asset with tag :tag was created successfully. <strong><a href=":link" style="color: white;">Click here to view</a></strong>.',
    ],

    'update' => [
        'error'   			=> 'Sredstvo ni bilo posodobljeno, poskusite znova',
        'success' 			=> 'Sredstvo je uspešno posodobljeno.',
        'nothing_updated'	=>  'Nobeno polje ni bilo izbrana, zato nebo nič posodobljeno.',
        'no_assets_selected'  =>  'No assets were selected, so nothing was updated.',
        'assets_do_not_exist_or_are_invalid' => 'Selected assets cannot be updated.',
    ],

    'restore' => [
        'error'   		=> 'Sredstvo ni bilo obnovljeno, poskusite znova',
        'success' 		=> 'Sredstvo je bilo uspešno obnovljeno.',
        'bulk_success' 		=> 'Sredstvo je bilo uspešno obnovljeno.',
        'nothing_updated'   => 'No assets were selected, so nothing was restored.', 
    ],

    'audit' => [
        'error'   		=> 'Revizija sredstva je bila neuspešna. Prosim poskusite ponovno.',
        'success' 		=> 'Revizija sredstva je uspešno zabeležena.',
    ],


    'deletefile' => [
        'error'   => 'Datoteka ni izbrisana. Prosim poskusite ponovno.',
        'success' => 'Datoteka je uspešno izbrisana.',
    ],

    'upload' => [
        'error'   => 'Datoteka(e) niso naložene. Prosim poskusite ponovno.',
        'success' => 'Datoteka(e) so bile uspešno naložene.',
        'nofiles' => 'Niste izbrali nobenih datotek za nalaganje, ali je datoteka ki jo poskušate naložiti prevelika',
        'invalidfiles' => 'Ena ali več vaših datotek je prevelika ali pa je tip datoteke, ki ni dovoljen. Dovoljeni tipi datotek so png, gif, jpg, doc, docx, pdf in txt.',
    ],

    'import' => [
        'error'                 => 'Nekateri elementi niso bili pravilno uvoženi.',
        'errorDetail'           => 'Naslednji elementi niso bili uvoženi zaradi napak.',
        'success'               => 'Vaša datoteka je bila uvožena',
        'file_delete_success'   => 'Vaša datoteka je bila uspešno izbrisana',
        'file_delete_error'      => 'Datoteke ni bilo mogoče izbrisati',
        'file_missing' => 'The file selected is missing',
        'header_row_has_malformed_characters' => 'One or more attributes in the header row contain malformed UTF-8 characters',
        'content_row_has_malformed_characters' => 'One or more attributes in the first row of content contain malformed UTF-8 characters',
    ],


    'delete' => [
        'confirm'   	=> 'Ali ste prepričani, da želite izbrisati to sredstvo?',
        'error'   		=> 'Prišlo je do težave z izbrisom sredstva. Prosim poskusite ponovno.',
        'nothing_updated'   => 'Nobena sredstva niso bila izbrana, zato ni bilo nič izbrisanih.',
        'success' 		=> 'Sredstvo je bilo uspešno izbrisano.',
    ],

    'checkout' => [
        'error'   		=> 'Sredstvo ni bila izdano, poskusite znova',
        'success' 		=> 'Sredstvo je bilo uspešno izdano.',
        'user_does_not_exist' => 'Ta uporabnik ni veljaven. Prosim poskusite ponovno.',
        'not_available' => 'To sredstvo ni na voljo za izdajo!',
        'no_assets_selected' => 'Na seznamu morate izbrati vsaj eno sredstev',
    ],

    'checkin' => [
        'error'   		=> 'Sredstev ni bilo prevzeto, poskusite znova',
        'success' 		=> 'Sredstev je bilo uspešno prevzeta.',
        'user_does_not_exist' => 'Ta uporabnik je neveljaven. Prosim poskusite ponovno.',
        'already_checked_in'  => 'Ta sredstev je že izdana.',

    ],

    'requests' => [
        'error'   		=> 'Sredstev ni bila zahtevana, poskusite znova',
        'success' 		=> 'Sredstev je uspešno zahtevana.',
        'canceled'      => 'Zahteva za izdajo je bila uspešno preklicana',
    ],

];
