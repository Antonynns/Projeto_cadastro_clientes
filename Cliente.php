<?php
class Cliente{
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $cpf;
    
    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id=$id;
    }
    function getNome(){
        return $this->nome;
    }
    function setNome($nome){
        $this->nome=$nome;
    }
    function getEmail(){
        return $this->email;
    }
    function setEmail($email){
        $this->email=$email;
    }
    function getTelefone(){
        return $this->telefone;
    }
    function setTelefone($telefone){
        $this->telefone=$telefone;
    }
    function getCpf(){
        return $this->cpf;
    }
    function setCpf($cpf){
        $this->cpf=$cpf;
    }
    
}
?>