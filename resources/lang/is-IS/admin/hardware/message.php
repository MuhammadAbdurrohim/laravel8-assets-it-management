<?php

return [

    'undeployable' 		=> '<strong>Varúð: </strong> Þessi eign hefur verið merkt sem ónothæf að svo stöddu.
                        Ef ástand hennar hefur breyst skaltu uppfæra stöðu eignarinnar.',
    'does_not_exist' 	=> 'Þessi eign finnst ekki.',
    'does_not_exist_or_not_requestable' => 'That asset does not exist or is not requestable.',
    'assoc_users'	 	=> 'Þessari eign hefur þegar verið ráðstafað til notanda og er því ekki hægt að afskrá. Vinsamlegast skilaðu eigninni fyrst og reyndu síðan að afskrá hana. ',

    'create' => [
        'error'   		=> 'Asset was not created, please try again. :(',
        'success' 		=> 'Það tókst að skrá þessa eign :)',
        'success_linked' => 'Asset with tag :tag was created successfully. <strong><a href=":link" style="color: white;">Click here to view</a></strong>.',
    ],

    'update' => [
        'error'   			=> 'Asset was not updated, please try again',
        'success' 			=> 'Asset updated successfully.',
        'nothing_updated'	=>  'No fields were selected, so nothing was updated.',
        'no_assets_selected'  =>  'No assets were selected, so nothing was updated.',
        'assets_do_not_exist_or_are_invalid' => 'Selected assets cannot be updated.',
    ],

    'restore' => [
        'error'   		=> 'Asset was not restored, please try again',
        'success' 		=> 'Asset restored successfully.',
        'bulk_success' 		=> 'Asset restored successfully.',
        'nothing_updated'   => 'No assets were selected, so nothing was restored.', 
    ],

    'audit' => [
        'error'   		=> 'Eignaúttekt var ekki skráð. Vinsamlegast reyndu aftur.',
        'success' 		=> 'Eignaúttekt var skráð.',
    ],


    'deletefile' => [
        'error'   => 'File not deleted. Please try again.',
        'success' => 'File successfully deleted.',
    ],

    'upload' => [
        'error'   => 'File(s) not uploaded. Please try again.',
        'success' => 'File(s) successfully uploaded.',
        'nofiles' => 'You did not select any files for upload, or the file you are trying to upload is too large',
        'invalidfiles' => 'One or more of your files is too large or is a filetype that is not allowed. Allowed filetypes are png, gif, jpg, doc, docx, pdf, and txt.',
    ],

    'import' => [
        'error'                 => 'Some items did not import correctly.',
        'errorDetail'           => 'The following Items were not imported because of errors.',
        'success'               => 'Your file has been imported',
        'file_delete_success'   => 'Your file has been been successfully deleted',
        'file_delete_error'      => 'The file was unable to be deleted',
        'file_missing' => 'The file selected is missing',
        'header_row_has_malformed_characters' => 'One or more attributes in the header row contain malformed UTF-8 characters',
        'content_row_has_malformed_characters' => 'One or more attributes in the first row of content contain malformed UTF-8 characters',
    ],


    'delete' => [
        'confirm'   	=> 'Ertu viss um að þú viljir afskrá þessa eign?',
        'error'   		=> 'There was an issue deleting the asset. Please try again.',
        'nothing_updated'   => 'No assets were selected, so nothing was deleted.',
        'success' 		=> 'The asset was deleted successfully.',
    ],

    'checkout' => [
        'error'   		=> 'Eigninni var ekki ráðstafað, vinsamlegast reyndu aftur',
        'success' 		=> 'Eigninni var ráðstafað.',
        'user_does_not_exist' => 'Notandinn er ónothæfur. Vinsamlegast reyndu aftur.',
        'not_available' => 'Þessi eign er ekki laus til ráðstöfunar!',
        'no_assets_selected' => 'Þú verður að velja að lágmarki eina eign úr listanum',
    ],

    'checkin' => [
        'error'   		=> 'Eigninni var ekki skilað, vinsamlegast reyndu aftur',
        'success' 		=> 'Eigninni var skilað.',
        'user_does_not_exist' => 'Þessi notandi er ónothæfur, vinsamlegast reyndu aftur.',
        'already_checked_in'  => 'Þessari eign hefur þegar verið skilað.',

    ],

    'requests' => [
        'error'   		=> 'Asset was not requested, please try again',
        'success' 		=> 'Asset requested successfully.',
        'canceled'      => 'Beiðni um ráðstöfun var afturkölluð',
    ],

];
