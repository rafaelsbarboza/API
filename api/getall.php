<?php

require_once('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'get') {
    $sql = $conexao->query("SELECT * FROM  notes");
    if($sql->rowCount() > 0) {
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $item) {
            $array['result'][] = [
                'id' => $item['id'],
                'titulo' => $item['titulo']
            ]; 
        }
    }

}else{
    $array['error'] = 'Metodo não permitido (apenas GET)';
}

require_once('../return.php');