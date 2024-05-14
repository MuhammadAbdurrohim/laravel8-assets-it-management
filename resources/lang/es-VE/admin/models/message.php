<?php

return array(

    'deleted' => 'Modelo de recurso eliminado',
    'does_not_exist' => 'El modelo no existe.',
    'no_association' => '¡ATENCIÓN! ¡El modelo de activo para este artículo no es válido o falta!',
    'no_association_fix' => 'Esto romperá cosas de formas extrañas y horribles. Edite este activo ahora para asignarle un modelo.',
    'assoc_users'	 => 'Este modelo está asignado a uno o más activos y no puede ser eliminado. Por favor, borra los activos y luego intenta borrarlo nuevamente. ',


    'create' => array(
        'error'   => 'El modelo no fue creado, por favor inténtalo de nuevo.',
        'success' => 'Modelo creado con éxito.',
        'duplicate_set' => 'Un modelo de activo con ese nombre, fabricante y número de modelo ya existe.',
    ),

    'update' => array(
        'error'   => 'El modelo no fue actualizado, por favor, inténtalo de nuevo',
        'success' => 'Modelo actualizado con éxito.',
    ),

    'delete' => array(
        'confirm'   => '¿Estás seguro de que quieres borrar este modelo de activo?',
        'error'   => 'Hubo un problema borrando el modelo. Por favor inténtalo de nuevo.',
        'success' => 'El modelo fue borrado con éxito.'
    ),

    'restore' => array(
        'error'   		=> 'El modelo no fue restaurado, por favor inténtalo de nuevo',
        'success' 		=> 'Modelo restaurado con éxito.'
    ),

    'bulkedit' => array(
        'error'   		=> 'Ningún cambio fue cambiado, así que nada se actualizó.',
        'success' 		=> 'Modelo actualizado correctamente. |:model_count modelos actualizados correctamente.',
        'warn'          => 'Está a punto de actualizar las propiedades del siguiente modelo:|Está a punto de editar las propiedades de los siguientes :model_count modelos:',

    ),

    'bulkdelete' => array(
        'error'   		    => 'Ningún modelo fue seleccionado, así que nada fue eliminado.',
        'success' 		    => 'Modelo eliminado!|:success_count modelos eliminados!',
        'success_partial' 	=> ':success_count modelo(s) se han eliminado, sin embargo, :fail_count no se pudieron eliminar debido a que aún tienen activos asociados a ellos.'
    ),

);
