<?php

return [

    'undeployable' 		=> '<strong>Advarsel: </strong> Dette aktiv er blevet markeret som uudnytteligt. Hvis denne status er ændret, skal du opdatere aktivstatus.',
    'does_not_exist' 	=> 'Asset eksisterer ikke.',
    'does_not_exist_or_not_requestable' => 'Dette aktiv findes ikke eller er ikke påkrævet.',
    'assoc_users'	 	=> 'Dette aktiv er i øjeblikket tjekket ud til en bruger og kan ikke slettes. Kontroller aktivet først, og prøv derefter at slette igen.',

    'create' => [
        'error'   		=> 'Akten blev ikke oprettet, prøv igen. :(',
        'success' 		=> 'Aktivet blev oprettet med succes. :)',
        'success_linked' => 'Aktiv med tag :tag blev oprettet. <strong><a href=":link" style="color: white;">Klik her for at se</a></strong>.',
    ],

    'update' => [
        'error'   			=> 'Akten blev ikke opdateret, prøv igen',
        'success' 			=> 'Asset opdateret med succes.',
        'nothing_updated'	=>  'Ingen felter blev valgt, så intet blev opdateret.',
        'no_assets_selected'  =>  'Ingen aktiver blev valgt, så intet blev opdateret.',
        'assets_do_not_exist_or_are_invalid' => 'Valgte aktiver kan ikke opdateres.',
    ],

    'restore' => [
        'error'   		=> 'Akten blev ikke gendannet, prøv igen',
        'success' 		=> 'Asset restaureret med succes.',
        'bulk_success' 		=> 'Asset restaureret med succes.',
        'nothing_updated'   => 'Ingen aktiver blev valgt, så intet blev gendannet.', 
    ],

    'audit' => [
        'error'   		=> 'Assetrevision mislykkedes. Prøv igen.',
        'success' 		=> 'Asset audit succesfuldt logget.',
    ],


    'deletefile' => [
        'error'   => 'Filen er ikke slettet. Prøv igen.',
        'success' => 'Filen er slettet korrekt.',
    ],

    'upload' => [
        'error'   => 'Fil (er) ikke uploadet. Prøv igen.',
        'success' => 'Fil (er), der blev uploadet korrekt.',
        'nofiles' => 'Du valgte ikke nogen filer til upload, eller filen du forsøger at uploade er for stor',
        'invalidfiles' => 'En eller flere af dine filer er for store eller er en filtype, der ikke er tilladt. Tilladte filtyper er png, gif, jpg, doc, docx, pdf og txt.',
    ],

    'import' => [
        'error'                 => 'Nogle elementer importerede ikke korrekt.',
        'errorDetail'           => 'Følgende elementer blev ikke importeret på grund af fejl.',
        'success'               => 'Din fil er blevet importeret',
        'file_delete_success'   => 'Din fil er blevet slettet korrekt',
        'file_delete_error'      => 'Filen kunne ikke slettes',
        'file_missing' => 'Den valgte fil mangler',
        'header_row_has_malformed_characters' => 'En eller flere attributter i overskriftsrækken indeholder misdannede UTF-8 tegn',
        'content_row_has_malformed_characters' => 'En eller flere attributter i den første række indhold indeholder misdannede UTF-8 tegn',
    ],


    'delete' => [
        'confirm'   	=> 'Er du sikker på, at du vil slette dette aktiv?',
        'error'   		=> 'Der opstod et problem ved at slette aktivet. Prøv igen.',
        'nothing_updated'   => 'Ingen aktiver blev valgt, så intet blev slettet.',
        'success' 		=> 'Aktivet blev slettet med succes.',
    ],

    'checkout' => [
        'error'   		=> 'Akten blev ikke tjekket ud, prøv igen',
        'success' 		=> 'Asset tjekket ud med succes.',
        'user_does_not_exist' => 'Denne bruger er ugyldig. Prøv igen.',
        'not_available' => 'Det aktiv er ikke tilgængeligt for kassen!',
        'no_assets_selected' => 'Du skal vælge mindst ét aktiv fra listen',
    ],

    'checkin' => [
        'error'   		=> 'Akten blev ikke tjekket ind, prøv igen',
        'success' 		=> 'Asset tjekket ind med succes.',
        'user_does_not_exist' => 'Denne bruger er ugyldig. Prøv igen.',
        'already_checked_in'  => 'Det aktiv er allerede kontrolleret.',

    ],

    'requests' => [
        'error'   		=> 'Akten blev ikke anmodet om, prøv igen',
        'success' 		=> 'Akten blev bedt om succes.',
        'canceled'      => 'Afbestillingsanmodningen er aflyst',
    ],

];
