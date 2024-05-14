<?php

return array(

    'deleted' => 'Deleted supplier',
    'does_not_exist' => 'Dobavljač ne postoji.',


    'create' => array(
        'error'   => 'Dobavljač nije izrađen, pokušajte ponovo.',
        'success' => 'Dobavljač je uspješno izrađen.'
    ),

    'update' => array(
        'error'   => 'Dobavljač nije ažuriran, pokušajte ponovo',
        'success' => 'Dobavljač je uspješno ažuriran.'
    ),

    'delete' => array(
        'confirm'   => 'Jeste li sigurni da želite izbrisati ovog dobavljača?',
        'error'   => 'Došlo je do problema s brisanjem dobavljača. Molim te pokušaj ponovno.',
        'success' => 'Dobavljač je uspješno izbrisan.',
        'assoc_assets'	 => 'Ovaj dobavljač je trenutno povezan sa :asset_count komadom/a imovine i ne može se izbrisati. Molimo ažurirajte imovinu tako da više ne bude povezana sa ovim dobavljačem i pokušajte ponovo. ',
        'assoc_licenses'	 => 'Ovaj dobavljač je trenutno povezan sa :licenses_count licencom/ama i ne može se izbrisati. Molimo ažurirajte licence tako da više ne budu povezane sa ovim dobavljačem i pokušajte ponovo. ',
        'assoc_maintenances'	 => 'Ovaj dobavljač je trenutno povezan sa :asset_maintenences_count slučajem/evima održavanja imovine i ne može se izbrisati. Molimo ažurirajte slučajeve održavanja imovine tako da više ne budu povezani sa ovim dobavljačem i pokušajte ponovo. ',
    )

);
