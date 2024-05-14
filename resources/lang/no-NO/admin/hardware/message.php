<?php

return [

    'undeployable' 		=> '<strong>Advarsel:</strong> Denne eiendelen er merket som ikke utleverbar.
                        Oppdater eiendelsstatus hvis situasjonen har endret seg.',
    'does_not_exist' 	=> 'Eiendel eksisterer ikke.',
    'does_not_exist_or_not_requestable' => 'Eiendelen eksisterer ikke eller kan ikke forespørres.',
    'assoc_users'	 	=> 'Denne eiendelen er merket som utsjekket til en bruker og kan ikke slettes. Vennligst sjekk inn eiendelen først, og forsøk sletting på nytt. ',

    'create' => [
        'error'   		=> 'Eiendelen ble ikke opprettet, prøv igjen :(',
        'success' 		=> 'Eiendelen ble opprettet :)',
        'success_linked' => 'Eiendelen med taggen :tag ble opprettet. <strong><a href=":link" style="color: white;">Klikk her for å vise</a></strong>.',
    ],

    'update' => [
        'error'   			=> 'Eiendelen ble ikke oppdatert, prøv igjen',
        'success' 			=> 'Oppdatering av eiendel vellykket.',
        'nothing_updated'	=>  'Ingen felter er valgt, så ingenting ble endret.',
        'no_assets_selected'  =>  'Ingen felter er valgt, så ingenting ble endret.',
        'assets_do_not_exist_or_are_invalid' => 'Valgte eiendeler kan ikke oppdateres.',
    ],

    'restore' => [
        'error'   		=> 'Eiendel ble ikke gjenopprettet. Prøv igjen',
        'success' 		=> 'Vellykket gjenoppretting av eiendel.',
        'bulk_success' 		=> 'Ressursen ble gjenopprettet.',
        'nothing_updated'   => 'Inger ressurser ble valgt, så ingenting ble gjenoprettet.', 
    ],

    'audit' => [
        'error'   		=> 'Asset audit var mislykket. Prøv på nytt.',
        'success' 		=> 'Asset audit ble logget.',
    ],


    'deletefile' => [
        'error'   => 'Fil ble ikke slettet. Prøv igjen.',
        'success' => 'Vellykket sletting av fil.',
    ],

    'upload' => [
        'error'   => 'Fil(er) ble ikke lastet opp. Prøv igjen.',
        'success' => 'Vellykket opplasting av fil(er).',
        'nofiles' => 'Ingen fil er valgt til opplasting, eller filen er for stor',
        'invalidfiles' => 'En eller flere av filene dine er for store eller av en ikke tillatt filtype. Tillatte filtyper er png, gif, jpg, doc, docx, pdf og txt.',
    ],

    'import' => [
        'error'                 => 'Noen elementer ble ikke importert riktig.',
        'errorDetail'           => 'Følgende elementer ble ikke importert på grunn av feil.',
        'success'               => 'Filen har blitt importert',
        'file_delete_success'   => 'Filen har blitt slettet',
        'file_delete_error'      => 'Filen kunne ikke bli slettet',
        'file_missing' => 'Valgt fil mangler (fant ikke filen)',
        'header_row_has_malformed_characters' => 'En eller flere attributter i overskriftsraden inneholder feilformede UTF-8 tegn',
        'content_row_has_malformed_characters' => 'En eller flere attributter i første rad i inneholdet inneholder feilformet UTF-8 tegn',
    ],


    'delete' => [
        'confirm'   	=> 'Er du sikker på at du vil slette eiendelen?',
        'error'   		=> 'Det oppstod et problem under sletting av eiendel. Vennligst prøv igjen.',
        'nothing_updated'   => 'Ingen assets ble valgt, så ingenting ble slettet.',
        'success' 		=> 'Vellykket sletting av eiendel.',
    ],

    'checkout' => [
        'error'   		=> 'Eiendel ble ikke sjekket ut. Prøv igjen',
        'success' 		=> 'Vellykket utsjekk av eiendel.',
        'user_does_not_exist' => 'Denne brukeren er ugyldig. Vennligst prøv igjen.',
        'not_available' => 'Den eiendelen er ikke tilgjengelig til å sjekkes ut!',
        'no_assets_selected' => 'Du må velge minst én enhet fra listen',
    ],

    'checkin' => [
        'error'   		=> 'Eiendel ble ikke sjekket inn. Prøv igjen',
        'success' 		=> 'Vellykket innsjekk av eiendel.',
        'user_does_not_exist' => 'Denne brukeren er ugyldig. Vennligst prøv igjen.',
        'already_checked_in'  => 'Den eiendelen er allerede sjekket inn.',

    ],

    'requests' => [
        'error'   		=> 'Eiendelen ble ikke forespurt, prøv igjen',
        'success' 		=> 'Eiendel ble forespurt.',
        'canceled'      => 'Utsjekkingsforespørselen ble kansellert',
    ],

];
