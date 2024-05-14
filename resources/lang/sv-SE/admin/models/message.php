<?php

return array(

    'deleted' => 'Raderad tillgångsmodell',
    'does_not_exist' => 'Modellen finns inte.',
    'no_association' => 'VARNING! Modellen för detta objekt är ogiltigt eller saknas!',
    'no_association_fix' => 'Detta kommer att bryta saker på konstiga och hemska sätt. Redigera denna tillgång nu för att tilldela det en modell.',
    'assoc_users'	 => 'Denna modell är redan associerad med en eller flera tillgångar och kan inte tas bort. Ta bort tillgången och försök sedan igen. ',


    'create' => array(
        'error'   => 'Modellen skapades inte, försök igen.',
        'success' => 'Modellen skapad.',
        'duplicate_set' => 'En tillgångsmodell med det namnet, tillverkaren och modellnumret finns redan.',
    ),

    'update' => array(
        'error'   => 'Modellen uppdaterades inte, försök igen',
        'success' => 'Modellen uppdaterad.',
    ),

    'delete' => array(
        'confirm'   => 'Är du säker på att du vill ta bort denna modell?',
        'error'   => 'Problem att ta bort modellen. Försök igen.',
        'success' => 'Modellen borttagen.'
    ),

    'restore' => array(
        'error'   		=> 'Modellen återskapades inte, försök igen',
        'success' 		=> 'Modellen återskapades.'
    ),

    'bulkedit' => array(
        'error'   		=> 'Inga fält ändrades, så ingenting uppdaterades.',
        'success' 		=> 'Modellen har uppdaterats. |:model_count modeller har uppdaterats.',
        'warn'          => 'Du håller på att uppdatera egenskaperna för följande modell:|Du håller på att redigera egenskaperna för följande :model_count modeller:',

    ),

    'bulkdelete' => array(
        'error'   		    => 'Inga tillgångar valdes, så ingenting togs bort.',
        'success' 		    => 'Modell borttagen! |:success_count modeller borttagna!',
        'success_partial' 	=> ':success_count modell(erna) raderades, men :fail_count kunde inte raderas eftersom de fortfarande har tillgångar kopplade till sig.'
    ),

);
