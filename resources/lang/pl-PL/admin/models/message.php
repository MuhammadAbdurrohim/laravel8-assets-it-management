<?php

return array(

    'deleted' => 'Usunięty model aktywów',
    'does_not_exist' => 'Model nie istnieje.',
    'no_association' => 'OSTRZEŻENIE! Model aktywów dla tego przedmiotu jest nieprawidłowy lub brakuje!',
    'no_association_fix' => 'To zepsuje rzeczy w dziwny i straszny sposób. Edytuj teraz ten zasób, aby przypisać mu model.',
    'assoc_users'	 => 'Ten model jest przypisany do minim jednego aktywa i nie może być usunięty. Proszę usunąć aktywa, a następnie spróbować ponownie. ',


    'create' => array(
        'error'   => 'Model nie został stworzony. Spróbuj ponownie.',
        'success' => 'Model utworzony pomyślnie.',
        'duplicate_set' => 'Istnieje już model aktywu o tej nazwie, producencie i numerze.',
    ),

    'update' => array(
        'error'   => 'Model nie został zaktualizowany, spróbuj ponownie',
        'success' => 'Model zaktualizowany pomyślnie.',
    ),

    'delete' => array(
        'confirm'   => 'Czy na pewno chcesz usunąć ten model aktywów?',
        'error'   => 'Wystąpił błąd podczas usuwania modelu. Spróbuj ponownie.',
        'success' => 'Model usunięty poprawnie.'
    ),

    'restore' => array(
        'error'   		=> 'Model nie został przywrócony, spróbuj ponownie',
        'success' 		=> 'Model został przywrócony pomyślnie.'
    ),

    'bulkedit' => array(
        'error'   		=> 'Żadne pole nie zostało zmodyfikowane, więc nic nie zostało zaktualizowane.',
        'success' 		=> 'Model pomyślnie zaktualizowany. |:model_count modele pomyślnie zaktualizowane.',
        'warn'          => 'Zamierzasz zaktualizować właściwości następującego modelu:|Zamierzasz edytować właściwości następujących modeli :model_count:',

    ),

    'bulkdelete' => array(
        'error'   		    => 'Nie wybrano modeli, więc nic nie zostało usunięte.',
        'success' 		    => 'Model usunięty!|:success_count modele usunięte!',
        'success_partial' 	=> ':success_count model(i) zostało usuniętych, jednakże :fail_count nie udało się usunąć, ponieważ wciąż są powiązane z nimi zasoby.'
    ),

);
