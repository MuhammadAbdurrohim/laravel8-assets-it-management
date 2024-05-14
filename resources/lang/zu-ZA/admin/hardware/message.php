<?php

return [

    'undeployable' 		=> '<strong>Thola: </strong> Lelifa limakwe njengamanje elingenakutholakali. Uma lesi simo sesishintshile, sicela ubuyekeze isimo sesifa.',
    'does_not_exist' 	=> 'Impahla ayikho.',
    'does_not_exist_or_not_requestable' => 'That asset does not exist or is not requestable.',
    'assoc_users'	 	=> 'Leli fayela okwamanje lihlolwe kumsebenzisi futhi alikwazi ukususwa. Sicela uhlole ifa ekuqaleni, bese uzama ukususa futhi.',

    'create' => [
        'error'   		=> 'Impahla ayidalwanga, sicela uzame futhi. :(',
        'success' 		=> 'Ifa lidalwe ngempumelelo. :)',
        'success_linked' => 'Asset with tag :tag was created successfully. <strong><a href=":link" style="color: white;">Click here to view</a></strong>.',
    ],

    'update' => [
        'error'   			=> 'Ifa alizange libuyekezwe, sicela uzame futhi',
        'success' 			=> 'Ifa libuyekezwe ngempumelelo.',
        'nothing_updated'	=>  'Awekho amasimu akhethiwe, ngakho-ke akukho lutho olubuyekeziwe.',
        'no_assets_selected'  =>  'No assets were selected, so nothing was updated.',
        'assets_do_not_exist_or_are_invalid' => 'Selected assets cannot be updated.',
    ],

    'restore' => [
        'error'   		=> 'Ifa alizange libuyiselwe, sicela uzame futhi',
        'success' 		=> 'Ifa libuyiselwe ngempumelelo.',
        'bulk_success' 		=> 'Ifa libuyiselwe ngempumelelo.',
        'nothing_updated'   => 'No assets were selected, so nothing was restored.', 
    ],

    'audit' => [
        'error'   		=> 'Ukuhlolwa kwamafa akuphumelelanga. Ngicela uzame futhi.',
        'success' 		=> 'I-akhawunti yokuthengisa ilandelwe ngempumelelo.',
    ],


    'deletefile' => [
        'error'   => 'Ifayela alisusiwe. Ngicela uzame futhi.',
        'success' => 'Ifayili isusiwe ngempumelelo.',
    ],

    'upload' => [
        'error'   => 'Amafayela (ama) awalayishiwe. Ngicela uzame futhi.',
        'success' => 'Amafayela (ama) alayishwe ngempumelelo.',
        'nofiles' => 'Awukakhethi noma yimaphi amafayela okulayishwa, noma ifayela ozama ukulilayisha likhulu kakhulu',
        'invalidfiles' => 'Ifayela elilodwa noma ngaphezulu likhulu kakhulu noma ifayelathi engavumelekile. Amafayela afakiwe avunyelwe i-png, i-gif, i-jpg, i-doc, i-docx, i-pdf, ne-txt.',
    ],

    'import' => [
        'error'                 => 'Ezinye izinto azange zingenise ngendlela efanele.',
        'errorDetail'           => 'Izinto ezilandelayo azange zingeniswe ngenxa yamaphutha.',
        'success'               => 'Ifayela lakho lifakiwe',
        'file_delete_success'   => 'Ifayela lakho lisusiwe ngempumelelo',
        'file_delete_error'      => 'Ifayela alikwazanga ukususwa',
        'file_missing' => 'The file selected is missing',
        'header_row_has_malformed_characters' => 'One or more attributes in the header row contain malformed UTF-8 characters',
        'content_row_has_malformed_characters' => 'One or more attributes in the first row of content contain malformed UTF-8 characters',
    ],


    'delete' => [
        'confirm'   	=> 'Uqinisekile ukuthi ufisa ukususa le mali?',
        'error'   		=> 'Kube nenkinga yokususa le mali. Ngicela uzame futhi.',
        'nothing_updated'   => 'Azikho izimpahla ezikhethiwe, ngakho akukho lutho olususwe.',
        'success' 		=> 'Impahla isusiwe ngempumelelo.',
    ],

    'checkout' => [
        'error'   		=> 'Ifa alizange lihlolwe, sicela uzame futhi',
        'success' 		=> 'Ifa likhiphe ngempumelelo.',
        'user_does_not_exist' => 'Lo msebenzisi awuvumelekile. Ngicela uzame futhi.',
        'not_available' => 'Le mali ayitholakali ukuhlolwa!',
        'no_assets_selected' => 'You must select at least one asset from the list',
    ],

    'checkin' => [
        'error'   		=> 'Ifa alizange lihlolwe, sicela uzame futhi',
        'success' 		=> 'Ifa lihlolwe ngempumelelo.',
        'user_does_not_exist' => 'Lo msebenzisi awuvumelekile. Ngicela uzame futhi.',
        'already_checked_in'  => 'Le mali isivele ihlolwe.',

    ],

    'requests' => [
        'error'   		=> 'Ifa alizange liceliwe, sicela uzame futhi',
        'success' 		=> 'Ifa liceliwe ngempumelelo.',
        'canceled'      => 'Isicelo sokuhlola sikhanseliwe ngempumelelo',
    ],

];
