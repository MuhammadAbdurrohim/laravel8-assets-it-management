<?php

return [

    'undeployable' 		=> '<strong>Aviso: </strong> Este artigo foi assinalado como "não implementável".
                        Se este estado mudou, por favor atualize o estado do artigo.',
    'does_not_exist' 	=> 'Artigo não existente.',
    'does_not_exist_or_not_requestable' => 'Esse artigo não existe ou não é solicitável.',
    'assoc_users'	 	=> 'Este artigo está correntemente alocado a um utilizador e não pode ser removido. Por favor devolva o artigo e de seguida tente remover novamente. ',

    'create' => [
        'error'   		=> 'Não foi possível criar o Artigo. Por favor, tente novamente. :(',
        'success' 		=> 'Artigo criado com sucesso. :)',
        'success_linked' => 'O ativo com a tag :tag foi criado com sucesso. <strong><a href=":link" style="color: white;">clique aqui para ver</a></strong>.',
    ],

    'update' => [
        'error'   			=> 'Artigo não foi atualizado. Por favor, tente novamente',
        'success' 			=> 'Artigo atualizado com sucesso.',
        'nothing_updated'	=>  'Nenhum atributo foi selecionado, portanto nada foi atualizado.',
        'no_assets_selected'  =>  'Nenhum ativo foi selecionado, por isso nada foi atualizado.',
        'assets_do_not_exist_or_are_invalid' => 'Os arquivos selecionados não podem ser atualizados.',
    ],

    'restore' => [
        'error'   		=> 'O Artigo não foi restaurado, por favor tente novamente',
        'success' 		=> 'Artigo restaurado com sucesso.',
        'bulk_success' 		=> 'Artigo restaurado com sucesso.',
        'nothing_updated'   => 'Nenhum artigo foi selecionado, assim nada restaurado.', 
    ],

    'audit' => [
        'error'   		=> 'A auditoria de ativos não teve êxito. Por favor, tente novamente.',
        'success' 		=> 'Auditoria de ativos logada com sucesso.',
    ],


    'deletefile' => [
        'error'   => 'Ficheiro não removido. Por favor, tente novamente.',
        'success' => 'Ficheiro removido com sucesso.',
    ],

    'upload' => [
        'error'   => 'Ficheiro(s) não submetidos. Por favor, tente novamente.',
        'success' => 'Ficheiro(s) submetidos com sucesso.',
        'nofiles' => 'Não selecionou nenhum ficheiro para submissão, ou o ficheiro que pretende submeter é demasiado grande',
        'invalidfiles' => 'Um ou mais ficheiros são demasiado grandes ou trata-se de um tipo de ficheiro não permitido. Os tipos de ficheiro permitidos são png, gif, jpg, jpeg, doc, docx, pdf e txt.',
    ],

    'import' => [
        'error'                 => 'Alguns itens não foram importados corretamente.',
        'errorDetail'           => 'Os seguintes itens não foram importados devido a erros.',
        'success'               => 'O seu ficheiro foi importado',
        'file_delete_success'   => 'Ficheiro eliminado com sucesso',
        'file_delete_error'      => 'Não foi possível eliminar o ficheiro',
        'file_missing' => 'Ficheiro selecionado está a faltar',
        'header_row_has_malformed_characters' => 'Um ou mais atributos na linha do cabeçalho contém caracteres UTF-8 mal formados',
        'content_row_has_malformed_characters' => 'Um ou mais atributos na primeira linha de conteúdo contém caracteres UTF-8 mal formados',
    ],


    'delete' => [
        'confirm'   	=> 'Tem a certeza de que pretende eliminar este artigo?',
        'error'   		=> 'Ocorreu um problema ao remover o artigo. Por favor, tente novamente.',
        'nothing_updated'   => 'Nenhum recurso foi selecionado, então nada foi excluído.',
        'success' 		=> 'O artigo foi removido com sucesso.',
    ],

    'checkout' => [
        'error'   		=> 'Não foi possível alocar o artigo, por favor tente novamente',
        'success' 		=> 'Artigo alocado com sucesso.',
        'user_does_not_exist' => 'O utilizador é inválido. Por favor, tente novamente.',
        'not_available' => 'Esse recurso não está disponível para checkout!',
        'no_assets_selected' => 'Deve escolher pelo menos um artigo da lista',
    ],

    'checkin' => [
        'error'   		=> 'Não foi possível devolver o artigo, por favor tente novamente',
        'success' 		=> 'Artigo devolvido com sucesso.',
        'user_does_not_exist' => 'O utilizador é inválido. Por favor, tente novamente.',
        'already_checked_in'  => 'Este artigo já foi devolvido.',

    ],

    'requests' => [
        'error'   		=> 'Ativo não foi solicitado, por favor tente novamente',
        'success' 		=> 'Ativo solicitado com sucesso.',
        'canceled'      => 'Requisição cancelado com sucesso',
    ],

];
