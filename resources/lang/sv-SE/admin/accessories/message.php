<?php

return array(

    'does_not_exist' => 'Tillbehöret [:id] finns inte.',
    'not_found' => 'Tillbehöret hittades inte.',
    'assoc_users'	 => 'Detta tillbehör har för närvarande :count objekt utcheckade till användare. Checka in tillbehöret och försök igen. ',

    'create' => array(
        'error'   => 'Tillbehöret skapades inte, vänligen försök igen.',
        'success' => 'Tillbehöret skapades.'
    ),

    'update' => array(
        'error'   => 'Tillbehöret uppdaterades inte, försök igen',
        'success' => 'Tillbehöret uppdaterades.'
    ),

    'delete' => array(
        'confirm'   => 'Är du säker på att du vill ta bort det här tillbehöret?',
        'error'   => 'Ett problem uppstod då tillbehöret skulle tas bort. Vänligen försök igen.',
        'success' => 'Tillbehöret togs bort.'
    ),

     'checkout' => array(
        'error'   		=> 'Tillbehöret checkades inte ut. Vänligen försök igen',
        'success' 		=> 'Tillbehöret checkades ut.',
        'unavailable'   => 'Tillbehöret är inte tillgängligt för utcheckning. Kontrollera antal tillgängligt',
        'user_does_not_exist' => 'Användaren är ogiltig. Försök igen.'
    ),

    'checkin' => array(
        'error'   		=> 'Tillbehöret checkades inte in. Vänligen försök igen',
        'success' 		=> 'Tillbehöret checkades in.',
        'user_does_not_exist' => 'Användaren är ogiltig. Försök igen.'
    )


);
