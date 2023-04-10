<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/projeto_estagio/Cliente.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/projeto_estagio/conexao.php';

class ClienteDAO{
    public static $instance;

    private function __construct() {

    }

    public static function getInstance() {

    if (!isset(self::$instance))

    self::$instance = new ClienteDAO();

    return self::$instance;

    }
    public function insert ($cliente){
        try {
            $sql = "INSERT INTO cliente (nome,telefone,email,cpf) VALUES (:nome,:telefone,:email,:cpf)"; 
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $cliente->getNome());
            $p_sql->bindValue(":telefone", $cliente->getTelefone());
            $p_sql->bindValue(":email", $cliente->getEmail());
            $p_sql->bindValue(":cpf", $cliente->getCpf());
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de salvar".$e->getMessage();
            }
    }
    public function update ($cliente){
        try {
            $sql = "UPDATE cliente SET nome=:nome,email=:email,cpf=:cpf, telefone=:telefone WHERE id=:id"; 
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $cliente->getNome());
            $p_sql->bindValue(":email", $cliente->getEmail());
            $p_sql->bindValue(":id", $cliente->getId());
            $p_sql->bindValue(":cpf", $cliente->getCpf());
            $p_sql->bindValue(":telefone", $cliente->getTelefone());
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de atualizar".$e->getMessage();
            exit();
            }
    }
    public function delete ($id){
        try {
            $sql = "DELETE FROM cliente WHERE id = :id";
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
            } catch (Exception $e) {
            print "Erro ao executar a função de deletar".$e->getMessage();
            }
    }

}

?>