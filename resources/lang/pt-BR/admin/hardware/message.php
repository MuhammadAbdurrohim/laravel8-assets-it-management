<?php

return [

    'undeployable' 		=> '<strong>Aviso:</strong> Este ativo foi marcado como atualmente não implementável.                        Se este status mudou, atualize o status do ativo.',
    'does_not_exist' 	=> 'O ativo não existe.',
    'does_not_exist_or_not_requestable' => 'Esse ativo não existe ou não pode ser solicitado.',
    'assoc_users'	 	=> 'Este bem está no momento associado com pelo menos um usuário e não pode ser deletado. Por favor, atualize seu bem para que não referencie mais este usuário e tente novamente. ',

    'create' => [
        'error'   		=> 'O ativo não foi criado, tente novamente. :(',
        'success' 		=> 'Ativo criado com sucesso. :)',
        'success_linked' => 'O ativo com a tag :tag foi criado com sucesso. <strong><a href=":link" style="color: white;">clique aqui para ver</a></strong>.',
    ],

    'update' => [
        'error'   			=> 'O ativo não foi atualizado, tente novamente',
        'success' 			=> 'Ativo atualizado com sucesso.',
        'nothing_updated'	=>  'Nenhum campo foi selecionado, então nada foi atualizado.',
        'no_assets_selected'  =>  'Nenhum ativo foi selecionado, portanto, nada foi atualizado.',
        'assets_do_not_exist_or_are_invalid' => 'Os arquivos selecionados não podem ser atualizados.',
    ],

    'restore' => [
        'error'   		=> 'O ativo não foi restaurado, tente novamente',
        'success' 		=> 'Ativo restaurado com sucesso.',
        'bulk_success' 		=> 'Ativo restaurado com sucesso.',
        'nothing_updated'   => 'Nenhum ativo foi selecionado, então nada foi restaurado.', 
    ],

    'audit' => [
        'error'   		=> 'A auditoria de equipamentos não teve êxito. Por favor, tente novamente.',
        'success' 		=> 'Auditoria de equipamentos logada com sucesso.',
    ],


    'deletefile' => [
        'error'   => 'O arquivo não foi excluído. Tente novamente.',
        'success' => 'Arquivo excluído com sucesso.',
    ],

    'upload' => [
        'error'   => 'O(s) arquivo(s) não foi/foram carregado(s). Tente novamente.',
        'success' => 'Arquivo(s) carregado(s) com sucesso.',
        'nofiles' => 'Você não selecionou arquivos para carregar, ou o arquivo que você esta tentando carrega é muito grande',
        'invalidfiles' => 'Um ou mais de seus arquivos é muito grande ou está em um tipo de arquivo não permitido. Os tipos permitidos são png, gif, jpg, doc, docx, pdf, e txt.',
    ],

    'import' => [
        'error'                 => 'Alguns itens não foram importados corretamente.',
        'errorDetail'           => 'Os seguintes itens não foram importados devido a erros.',
        'success'               => 'O seu arquivo foi importado',
        'file_delete_success'   => 'O arquivo foi excluído com sucesso',
        'file_delete_error'      => 'Não foi possível excluir o arquivo',
        'file_missing' => 'O arquivo selecionado está faltando',
        'header_row_has_malformed_characters' => 'Um ou mais atributos na linha do cabeçalho contém caracteres UTF-8 malformados',
        'content_row_has_malformed_characters' => 'Um ou mais atributos na primeira linha de conteúdo contém caracteres UTF-8 malformados',
    ],


    'delete' => [
        'confirm'   	=> 'Tem certeza de que deseja excluir este ativo?',
        'error'   		=> 'Houve um problema ao excluir o ativo. Tente novamente.',
        'nothing_updated'   => 'Nenhum ativo foi selecionado, então nada foi deletado.',
        'success' 		=> 'O ativo foi excluído com sucesso.',
    ],

    'checkout' => [
        'error'   		=> 'Ativo não foi registrado, favor tentar novamente',
        'success' 		=> 'Ativo registrado com sucesso.',
        'user_does_not_exist' => 'Este usuário é inválido. Tente novamente.',
        'not_available' => 'Esse recurso não está disponível para checkout!',
        'no_assets_selected' => 'Você deve selecionar pelo menos um recurso da lista',
    ],

    'checkin' => [
        'error'   		=> 'Ativo não foi retornado, favor tentar novamente',
        'success' 		=> 'Ativo retornado com sucesso.',
        'user_does_not_exist' => 'Este usuário é inválido. Tente novamente.',
        'already_checked_in'  => 'Este ativo já foi devolvido.',

    ],

    'requests' => [
        'error'   		=> 'Ativo não foi solicitado, por favor tente novamente',
        'success' 		=> 'Ativo solicitado com sucesso.',
        'canceled'      => 'Requisição cancelada com sucesso',
    ],

];
