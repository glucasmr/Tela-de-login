<?php

Class Usuario
{
    private $pdo; //private somente é visto dentro da classe.
    public $msgErro = ""; // se está variável está vazia significa que está ok

    public function conectar($nome, $host, $usuario, $senha) 
    {
        global $pdo; //dentro de cada método, deve colocar global para indicar ao método que se trata da mesma variável declarada acima
        global $msgErro;

        try { //o bloco try catch avalia se ocorre algum erro
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);// $pdo é uma instância da classe PDO. seu construtor pede estes 4 parâmetros
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
        
    }

    public function cadastrar($nome,$telefone,$email,$senha)
    {
        global $pdo;
        // verificar se já esta cadastrado(email)
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");//faz o select no banco onde algum usuario tenha o mesmo email digitado
        $sql->bindValue(":e",$email);
        $sql->execute();

        if($sql->rowCount() > 0)
        {
            return false; //já esta cadastrada
        }
        else
        {
            // se não, cadastrar
            $sql = $pdo->prepare("INSERT INTO usuarios(nome,telefone,email,senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));//antes de fazer a inserção no banco de dados, realiza a criptografia da senha
            $sql->execute();
            return true; //cadastrado com sucesso
        }
        
    }   

    public function logar($email,$senha)
    {
        global $pdo;
        //verificar se o email e senha estão cadastrados, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e" ,$email);
        $sql->bindValue(":s" ,md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            //entrar no sistema (sessão)
            $dado = $sql->fetch(); //pega a consulta(sql) que veio do banco e salva em um dado. Usa o método fetch() que transforma a informação que veio do BD em um array com nomes das colunas
            session_start(); 
            $_SESSION['id_usuario'] = $dado['id_usuario']; //$_SESSION['id_usuario'] é uma variável global da sessão. recebe o array de mesmo nome obtido da consulta
            return true; //logado com sucesso


        }
        else
        {
            return false; //não cadastrado ou não foi possível logar
        }
        
        
        
        
        






    }


}

?>