<?php

return array(

    'does_not_exist' => 'Die Kategorie existiert nicht.',
    'assoc_models'	 => 'Diese Kategorie kann nicht gelöscht werden, da sie bereits einem Modell zugewiesen ist. Bitte entferne diese Kategorie von Deinen Modellen und versuche es erneut. ',
    'assoc_items'	 => 'Diese Kategorie kann nicht gelöscht werden, da sie bereits mit einem :asset_type verbunden ist. Bitte trenne diese Kategorie von Deinem :asset_type und versuche es erneut. ',

    'create' => array(
        'error'   => 'Die Kategorie konnte nicht erstellt werden, bitte versuche es erneut.',
        'success' => 'Die Kategorie wurde erfolgreich erstellt.'
    ),

    'update' => array(
        'error'   => 'Die Kategorie konnte nicht aktualisiert werden, bitte versuche es erneut',
        'success' => 'Die Kategorie wurde erfolgreich aktualisiert.',
        'cannot_change_category_type'   => 'Sobald der Kategorietyp erstellt wurde, kann dieser nicht mehr angepasst werden',
    ),

    'delete' => array(
        'confirm'   => 'Bist Du sicher, dass Du diese Kategorie löschen willst?',
        'error'   => 'Beim löschen der Kategorie ist ein Problem aufgetreten. Bitte versuche es erneut.',
        'success' => 'Die Kategorie wurde erfolgreich gelöscht.'
    )

);
