<?php

return array(

    'deleted' => 'Löschter Lieferant',
    'does_not_exist' => 'Lieferant existiert nicht.',


    'create' => array(
        'error'   => 'Lieferant wurde nicht erstellt, bitte versuche es erneut.',
        'success' => 'Lieferant wurde erfolgreich erstellt.'
    ),

    'update' => array(
        'error'   => 'Lieferant wurde nicht aktualisiert, bitte versuche es erneut',
        'success' => 'Lieferant wurde erfolgreich aktualisiert.'
    ),

    'delete' => array(
        'confirm'   => 'Bist Du sicher, dass Du diesen Lieferanten löschen möchtest?',
        'error'   => 'Beim Löschen des Lieferanten ist ein Fehler aufgetreten. Bitte versuche es erneut.',
        'success' => 'Lieferant wurde erfolgreich gelöscht.',
        'assoc_assets'	 => 'Dieser Lieferant ist derzeit :asset_count Asset(s) zugeordnet und kann nicht gelöscht werden. Bitte aktualisiere Deine Assets, so dass sie nicht mehr auf diesen Lieferant verweisen und versuche es erneut. ',
        'assoc_licenses'	 => 'Dieser Lieferant ist derzeit mit :licenses_count Lizenze(n) verknüpft und kann nicht gelöscht werden. Bitte aktualisiere Deine Lizenzen, so dass sie nicht mehr auf diesen Lieferant verweisen und versuche es erneut. ',
        'assoc_maintenances'	 => 'Dieser Lieferant ist derzeit mit :asset_maintenances_count Asset Wartung(en) verknüpft und kann nicht gelöscht werden. Bitte aktualisiere Deine Wartungsarbeiten, um diesen Lieferanten nicht mehr zu referenzieren und versuche es erneut. ',
    )

);
