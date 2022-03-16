<?php

require_once('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'get') {
    $id = $_GET['id'];

    if($id) {
        $sql = $conexao->prepare("SELECT * FROM notes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
            if($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $array['result'] = [
                    'id' => $data['id'],
                    'titulo' => $data['titulo'],
                    'corpo' => $data['corpo']
                ];
            }else{
                $array['error'] = 'ID inexistentie';
            }   

    }else{
        $array['error'] = 'ID não enviado';
    }

}else{
    $array['error'] = 'Metodo não permitido (apenas GET)';
}

require_once('../return.php');