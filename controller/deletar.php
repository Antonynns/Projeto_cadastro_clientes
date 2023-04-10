<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/projeto_estagio/DAO/ClienteDAO.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        //chama a função delete passando o id do registro
        ClienteDAO::getInstance()->delete($id);
        
        //redireciona de volta para a página da tabela
        header("Location: ../view/pagina_principal.php");
        exit();
    } else {
        echo "Erro ao deletar registro.";
    }
?>