<?php

return [

    'does_not_exist' => 'L\'etichetta di stato non esiste.',
    'deleted_label' => 'Etichetta di Stato "Eliminato"',
    'assoc_assets'	 => 'Questa etichetta di stato è attualmente associata ad almeno un Asset e non può essere cancellata.
Per favore aggiorna i tuoi Asset per togliere i riferimenti a questo stato e riprova. ',

    'create' => [
        'error'   => 'Lo stato non è stato creato, per favore riprova.',
        'success' => 'Etichetta di stato creata correttamente.',
    ],

    'update' => [
        'error'   => 'Lo stato non è stato aggiornato, per favore riprova',
        'success' => 'Etichetta di stato aggiornata correttamente.',
    ],

    'delete' => [
        'confirm'   => 'Sei sicuro di voler cancellare questo stato?',
        'error'   => 'C\'è stato un problema cancellando lo stato. Per favore riprova.',
        'success' => 'L\'etichetta di stato è stata cancellata correttamente.',
    ],

    'help' => [
        'undeployable'   => 'Queste attività non possono essere assegnate a nessuno.',
        'deployable'   => 'Puoi fare il check-out di questi beni. Una volta assegnati, avranno il meta-stato <i class="fas fa-circle text-blue"></i> <strong>Assegnato</strong>.',
        'archived'   => 'Queste attività non possono essere verificate e verranno visualizzate solo nella visualizzazione archiviata. Ciò è utile per conservare le informazioni sugli asset per finalità di bilancio o storiche ma mantenerle dall\'elenco delle attività quotidiane.',
        'pending'   => 'Queste attività non possono ancora essere assegnate a nessuno, spesso utilizzate per gli oggetti che sono fuori per la riparazione, ma si prevede di tornare alla circolazione.',
    ],

];
