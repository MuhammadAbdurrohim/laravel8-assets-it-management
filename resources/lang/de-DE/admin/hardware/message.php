<?php

return [

    'undeployable' 		=> '<strong>Achtung:</strong>Dieses Asset wurde kürzlich als nicht verteilbar markiert.
                        Falls sich dieser Status verändert hat, aktualisieren Sie bitte den Asset Status.',
    'does_not_exist' 	=> 'Asset existiert nicht.',
    'does_not_exist_or_not_requestable' => 'Dieses Asset existiert nicht oder kann nicht angefordert werden.',
    'assoc_users'	 	=> 'Dieses Asset ist im Moment an einen Benutzer herausgegeben und kann nicht entfernt werden. Bitte buchen sie das Asset wieder ein und versuchen Sie dann erneut es zu entfernen. ',

    'create' => [
        'error'   		=> 'Asset wurde nicht erstellt. Bitte versuchen Sie es erneut. :(',
        'success' 		=> 'Asset wurde erfolgreich erstellt. :)',
        'success_linked' => 'Asset mit Tag :tag wurde erfolgreich erstellt. <strong><a href=":link" style="color: white;">Klicken Sie hier, um</a></strong> anzuzeigen.',
    ],

    'update' => [
        'error'   			=> 'Asset wurde nicht aktualisiert. Bitte versuchen Sie es erneut',
        'success' 			=> 'Asset wurde erfolgreich aktualisiert.',
        'nothing_updated'	=>  'Es wurden keine Felder ausgewählt, somit wurde auch nichts aktualisiert.',
        'no_assets_selected'  =>  'Es wurden keine Assets ausgewählt, somit wurde auch nichts aktualisiert.',
        'assets_do_not_exist_or_are_invalid' => 'Ausgewählte Assets können nicht aktualisiert werden.',
    ],

    'restore' => [
        'error'   		=> 'Asset wurde nicht wiederhergestellt, bitte versuchen Sie es noch einmal',
        'success' 		=> 'Asset erfolgreich wiederhergestellt.',
        'bulk_success' 		=> 'Asset erfolgreich wiederhergestellt.',
        'nothing_updated'   => 'Es wurden keine Assets ausgewählt, also wurde nichts wiederhergestellt.', 
    ],

    'audit' => [
        'error'   		=> 'Asset Audit war nicht erfolgreich. Bitte versuche es erneut.',
        'success' 		=> 'Asset-Audit erfolgreich protokolliert.',
    ],


    'deletefile' => [
        'error'   => 'Datei wurde nicht gelöscht. Bitte versuchen Sie es erneut.',
        'success' => 'Datei erfolgreich gelöscht.',
    ],

    'upload' => [
        'error'   => 'Datei(en) wurde(n) nicht hochgeladen. Bitte versuchen Sie es erneut.',
        'success' => 'Datei(en) erfolgreich hochgeladen.',
        'nofiles' => 'Es wurde keine Datei zum Hochladen ausgewählt, oder die Datei ist zu groß',
        'invalidfiles' => 'Eine oder mehrere Ihrer Dateien sind zu groß oder deren Dateityp ist nicht zugelassen. Zugelassene Dateitypen sind png, gif, jpg, doc, docx, pdf, und txt.',
    ],

    'import' => [
        'error'                 => 'Einige Elemente wurden nicht korrekt importiert.',
        'errorDetail'           => 'Die folgenden Elemente wurden aufgrund von Fehlern nicht importiert.',
        'success'               => 'Ihre Datei wurde importiert',
        'file_delete_success'   => 'Die Datei wurde erfolgreich gelöscht',
        'file_delete_error'      => 'Die Datei konnte nicht gelöscht werden',
        'file_missing' => 'Die ausgewählte Datei fehlt',
        'header_row_has_malformed_characters' => 'Ein oder mehrere Attribute in der Kopfzeile enthalten fehlerhafte UTF-8 Zeichen',
        'content_row_has_malformed_characters' => 'Ein oder mehrere Attribute in der ersten Zeile des Inhalts enthalten fehlerhafte UTF-8-Zeichen',
    ],


    'delete' => [
        'confirm'   	=> 'Sind Sie sicher, dass Sie dieses Asset entfernen möchten?',
        'error'   		=> 'Beim Entfernen dieses Assets ist ein Fehler aufgetreten. Bitte versuchen Sie es erneut.',
        'nothing_updated'   => 'Es wurden keine Assets ausgewählt, somit wurde auch nichts gelöscht.',
        'success' 		=> 'Dieses Asset wurde erfolgreich entfernt.',
    ],

    'checkout' => [
        'error'   		=> 'Asset konnte nicht herausgegeben werden. Bitte versuchen Sie es erneut',
        'success' 		=> 'Asset wurde erfolgreich herausgegeben.',
        'user_does_not_exist' => 'Dieser Benutzer existiert nicht. Bitte versuchen Sie es erneut.',
        'not_available' => 'Dieses Asset kann nicht herausgegeben werden!',
        'no_assets_selected' => 'Sie müssen mindestens ein Asset aus der Liste auswählen',
    ],

    'checkin' => [
        'error'   		=> 'Asset konnte nicht zurückgenommen werden. Bitte versuchen Sie es erneut',
        'success' 		=> 'Asset wurde erfolgreich zurückgenommen.',
        'user_does_not_exist' => 'Dieser Benutzer existiert nicht. Bitte versuchen Sie es erneut.',
        'already_checked_in'  => 'Dieses Asset ist bereits zurückgenommen.',

    ],

    'requests' => [
        'error'   		=> 'Das Asset wurde nicht angefordert, bitte versuchen Sie es erneut',
        'success' 		=> 'Gegenstand erfolgreich angefordert.',
        'canceled'      => 'Herausgeben erfolgreich abgebrochen',
    ],

];
